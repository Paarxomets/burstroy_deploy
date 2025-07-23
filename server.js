const express = require('express');
const fs = require('fs').promises;
const path = require('path');
const multer = require('multer');
const app = express();
const PORT = process.env.PORT || 3000;

const storage = multer.diskStorage({
    destination: (req, file, cb) => {
        cb(null, 'public/img/');
    },
    filename: (req, file, cb) => {
        const uniqueSuffix = Date.now() + '-' + Math.round(Math.random() * 1E9);
        cb(null, `${uniqueSuffix}-${file.originalname}`);
    }
});
const upload = multer({
    storage,
    fileFilter: (req, file, cb) => {
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (allowedTypes.includes(file.mimetype)) {
            cb(null, true);
        } else {
            cb(new Error('Только изображения (jpeg, png, gif) разрешены'));
        }
    }
}).any();

app.use(express.json());
app.use(express.static('public'));

const ensureImgDir = async () => {
    const imgDir = path.join(__dirname, 'public/img');
    try {
        await fs.access(imgDir);
    } catch {
        await fs.mkdir(imgDir, { recursive: true });
    }
};

const ensureDir = async (dir) => {
    try {
        await fs.access(dir);
    } catch {
        await fs.mkdir(dir, { recursive: true });
    }
};

app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

app.post('/save-article', async (req, res) => {
    await ensureImgDir();

    upload(req, res, async (err) => {
        if (err) {
            console.error('Ошибка загрузки файла:', err);
            return res.status(500).json({ error: 'Ошибка при загрузке файлов' });
        }

        const filePath = path.join(__dirname, 'public', 'data_article.json');
        const templatePath = path.join(__dirname, 'public', 'chablon.html');
        const newData = req.body;
        const photos = req.files || [];

        console.log('Полученные данные из формы:', newData);
        console.log('Полученные файлы:', photos.map(f => ({ fieldname: f.fieldname, originalname: f.originalname, filename: f.filename })));
        console.log('Полученное значение checkbox:', newData.checkbox);

        try {
            if (!newData.title || !newData.datetime || !newData.elements) {
                console.error('Некорректные данные:', newData);
                return res.status(400).json({ error: 'Некорректные данные формы' });
            }

            let elements;
            try {
                elements = JSON.parse(newData.elements);
            } catch (e) {
                console.error('Ошибка парсинга elements:', e);
                return res.status(400).json({ error: 'Ошибка в формате элементов' });
            }

            let json = [];
            try {
                const fileData = await fs.readFile(filePath, 'utf8');
                json = JSON.parse(fileData);
                if (!Array.isArray(json)) {
                    json = [];
                }
            } catch (e) {
                if (e.code !== 'ENOENT') {
                    console.error('Ошибка чтения JSON:', e);
                    return res.status(500).json({ error: 'Ошибка при чтении файла данных' });
                }
            }

            if (json.some(article => article && article.title === newData.title)) {
                return res.status(400).json({ error: 'Статья с таким названием уже существует' });
            }

            const articleData = {
                id: Date.now().toString(),
                datetime: newData.datetime,
                title: newData.title || 'Без названия',
                checkbox: newData.checkbox === 'true',
                content: {
                    elements: elements.map((el) => {
                        if (el.type === 'photo') {
                            const photoIndex = el.value.index;
                            const photo = photos.find(p => p.fieldname === `photo_${photoIndex}`);
                            if (!photo) {
                                console.warn(`Файл для photo_${photoIndex} не найден`);
                                return null;
                            }
                            return {
                                type: 'photo',
                                value: {
                                    description: el.value.description || '',
                                    filename: path.join('img', photo.filename).replace(/\\/g, '/')
                                }
                            };
                        }
                        return el;
                    }).filter(el => el)
                }
            };

            console.log('Сохраняемые данные в JSON:', JSON.stringify(articleData, null, 2));

            if (!articleData.title || !articleData.datetime) {
                console.error('Невалидные данные для записи:', articleData);
                return res.status(400).json({ error: 'Невалидные данные для записи' });
            }

            json.push(articleData);

            const articleHtmlPath = path.join(__dirname, 'public/articles', `${articleData.id}.html`);
            await ensureDir(path.join(__dirname, 'public/articles'));
            let template;
            try {
                template = await fs.readFile(templatePath, 'utf8');
            } catch (e) {
                console.error('Ошибка чтения chablon.html:', e);
                return res.status(500).json({ error: 'Ошибка чтения шаблона' });
            }

            const description = articleData.content.elements
                .filter(el => el.type === 'text' || el.type === 'quote')
                .map(el => el.value)
                .join(' ')
                .slice(0, 160);
            const keywords = (articleData.title || 'статья').split(' ').concat(['статья', 'новости']).join(',');
            const contentHtml = articleData.content.elements.map(el => {
                if (el.type === 'title') {
                    return `<h2>${el.value}</h2>`;
                } else if (el.type === 'text') {
                    return `<p>${el.value}</p>`;
                } else if (el.type === 'photo') {
                    return `
                        <figure>
                            <img src="/${el.value.filename}" alt="${el.value.description}" style="max-width: 100%;">
                            <figcaption>${el.value.description}</figcaption>
                        </figure>
                    `;
                } else if (el.type === 'quote') {
                    return `<blockquote>${el.value}</blockquote>`;
                }
            }).join('');

            template = template.replace(/\{\{title_article\}\}/g, articleData.title || 'Без названия');
            template = template.replace(/\{\{datetime\}\}/g, articleData.datetime || '');
            template = template.replace(/\{\{content\}\}/g, contentHtml || '');
            template = template.replace(/\{\{description\}\}/g, description || '');
            template = template.replace(/\{\{keywords\}\}/g, keywords || '');
            template = template.replace(/\{\{id\}\}/g, articleData.id || '');

            try {
                await fs.writeFile(articleHtmlPath, template);
                console.log(`HTML-файл создан: ${articleHtmlPath}`);
            } catch (e) {
                console.error('Ошибка записи HTML-файла:', e);
                return res.status(500).json({ error: 'Ошибка при записи HTML-файла' });
            }

            await fs.writeFile(filePath, JSON.stringify(json, null, 2));
            res.status(200).json({ 
                message: `Данные сохранены`,
                photoCount: photos.length
            });
        } catch (err) {
            console.error('Ошибка сервера:', err);
            res.status(500).json({ error: 'Ошибка сервера при сохранении данных' });
        }
    });
});

app.get('/article/:id', async (req, res) => {
    const articleId = req.params.id;
    if (articleId.includes('.')) {
        return res.status(404).sendFile(path.join(__dirname, 'public', '404.html'));
    }

    const articleHtmlPath = path.join(__dirname, 'public/articles', `${articleId}.html`);
    try {
        const html = await fs.readFile(articleHtmlPath, 'utf8');
        res.send(html);
    } catch (err) {
        console.error('Ошибка загрузки статьи:', err);
        res.status(404).sendFile(path.join(__dirname, 'public', '404.html'));
    }
});

app.get('/articles-data', async (req, res) => {
    const filePath = path.join(__dirname, 'public', 'data_article.json');
    try {
        const fileData = await fs.readFile(filePath, 'utf8');
        let json = JSON.parse(fileData);
        if (!Array.isArray(json)) {
            json = [];
        }

        json = await Promise.all(json.map(async (article) => {
            const articleHtmlPath = path.join(__dirname, 'public/articles', `${article.id}.html`);
            try {
                await fs.access(articleHtmlPath);
                return article;
            } catch {
                console.warn(`HTML-файл для статьи ${article.id} не найден, статья исключена`);
                return null;
            }
        }));
        json = json.filter(article => article);

        res.json(json);
    } catch (err) {
        console.error('Ошибка загрузки данных статей:', err);
        res.status(500).json({ error: 'Ошибка при загрузке данных статей' });
    }
});

app.delete('/article/:id', async (req, res) => {
    const filePath = path.join(__dirname, 'public', 'data_article.json');
    const articleHtmlPath = path.join(__dirname, 'public/articles', `${req.params.id}.html`);
    try {
        let json = [];
        try {
            const fileData = await fs.readFile(filePath, 'utf8');
            json = JSON.parse(fileData);
            if (!Array.isArray(json)) {
                json = [];
            }
        } catch (e) {
            if (e.code !== 'ENOENT') {
                console.error('Ошибка чтения JSON:', e);
                return res.status(500).json({ error: 'Ошибка при чтении файла данных' });
            }
        }

        const articleIndex = json.findIndex(article => article.id === req.params.id);
        if (articleIndex === -1) {
            return res.status(404).json({ error: 'Статья не найдена' });
        }

        const article = json[articleIndex];
        const photoElements = article.content.elements.filter(el => el.type === 'photo');
        for (const photo of photoElements) {
            if (photo.value.filename) {
                const imagePath = path.join(__dirname, 'public', photo.value.filename);
                try {
                    await fs.unlink(imagePath);
                    console.log(`Удалён файл изображения: ${imagePath}`);
                } catch (e) {
                    if (e.code !== 'ENOENT') {
                        console.error(`Ошибка удаления файла изображения ${imagePath}:`, e);
                    }
                }
            }
        }

        json.splice(articleIndex, 1);

        try {
            await fs.unlink(articleHtmlPath);
            console.log(`Удалён HTML-файл: ${articleHtmlPath}`);
        } catch (e) {
            if (e.code !== 'ENOENT') {
                console.error('Ошибка удаления HTML:', e);
            }
        }

        await fs.writeFile(filePath, JSON.stringify(json, null, 2));
        res.status(200).json({ message: 'Статья удалена' });
    } catch (err) {
        console.error('Ошибка сервера:', err);
        res.status(500).json({ error: 'Ошибка сервера при удалении статьи' });
    }
});

app.get('/sitemap.xml', async (req, res) => {
    const filePath = path.join(__dirname, 'public', 'data_article.json');
    try {
        const fileData = await fs.readFile(filePath, 'utf8');
        let json = JSON.parse(fileData);
        if (!Array.isArray(json)) {
            json = [];
        }

        json = await Promise.all(json.map(async (article) => {
            const articleHtmlPath = path.join(__dirname, 'public/articles', `${article.id}.html`);
            try {
                await fs.access(articleHtmlPath);
                return article;
            } catch {
                console.warn(`HTML-файл для статьи ${article.id} не найден, исключена из sitemap`);
                return null;
            }
        }));
        json = json.filter(article => article);

        const baseUrl = 'https://parkhozk.beget.tech';
        const sitemap = `
            <?xml version="1.0" encoding="UTF-8"?>
            <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
                <url>
                    <loc>${baseUrl}/</loc>
                    <changefreq>weekly</changefreq>
                    <priority>0.8</priority>
                </url>
                <url>
                    <loc>${baseUrl}/portfolio.html</loc>
                    <changefreq>weekly</changefreq>
                    <priority>0.8</priority>
                </url>
                <url>
                    <loc>${baseUrl}/tecnology.html</loc>
                    <changefreq>weekly</changefreq>
                    <priority>0.8</priority>
                </url>
                ${json.map(article => `
                    <url>
                        <loc>${baseUrl}/article/${article.id}</loc>
                        <lastmod>${new Date(article.datetime).toISOString()}</lastmod>
                        <changefreq>monthly</changefreq>
                        <priority>0.7</priority>
                    </url>
                `).join('')}
            </urlset>
        `;
        res.header('Content-Type', 'application/xml');
        res.send(sitemap);
    } catch (err) {
        console.error('Ошибка создания sitemap:', err);
        res.status(500).send('Ошибка сервера');
    }
});

app.use((req, res) => {
    res.status(404).sendFile(path.join(__dirname, 'public', '404.html'));
});

app.listen(PORT, () => {
    console.log(`Сервер запущен на порту ${PORT}`);
});