document.addEventListener('DOMContentLoaded', () => {
    const createArticleBtn = document.getElementById('create_form_article');
    const containerForm = document.querySelector('.create_edit_form');
    const listArticlesContent = document.querySelector('.list_articles_content');
    let isRendered = false;

    const templates = {
        articleForm: () => `
            <div class="form_article">
                <div class="create_article">
                    <div class="input-group">
                        <input required type="text" name="article_title" autocomplete="off" class="input">
                        <label class="user-label">Название статьи</label>
                        <button class="delete-form tooltip">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                            </svg>
                            <span class="tooltiptext">удалить</span>
                        </button>
                    </div>
                    <div class="pqiowefjiuwfoqiuefo">
                        <div class="checkbox-group">
                            <input type="checkbox" id="technology" name="technology">
                            <label for="technology">Эта статья относится к технологии?</label>
                        </div>
                        <p id="datetime">время</p>
                    </div>
                    <div class="create_elements"></div>
                    <div class="button_group">
                        <button type="button" id='get_title'>Заголовок<span>+</span></button>
                        <button type="button" id='get_text'>Текст<span>+</span></button>
                        <button type="button" id='get_download'>Фотография<span>+</span></button>
                        <button type="button" id='get_quote'>Цитата<span>+</span></button>
                    </div>
                    <div class="button_group wkemf">
                        <button type="button" class='add_article'>Сохранить</button>
                    </div>
                </div>
            </div>
        `,
        titleForm: () => `
            <div class="input-group element" data-type="title">
                <input required type="text" name="title" autocomplete="off" class="input">
                <label class="user-label">Заголовок</label>
                <button class="delete-element tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                    </svg>
                    <span class="tooltiptext">удалить</span>
                </button>
            </div>
        `,
        textForm: () => `
            <div class="input-group_article_text element" data-type="text">
                <textarea required name="text" autocomplete="off" class="input_article_text"></textarea>
                <button class="delete-element tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                    </svg>
                    <span class="tooltiptext">удалить</span>
                </button>
            </div>
        `,
        downloadForm: () => `
            <form class="file-upload-form element" data-type="photo" onsubmit="return false;">
                <label for="file_${Date.now()}" class="file-upload-label">
                    <div class="file-upload-design">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                        </svg>
                        <p>Перетащите сюда фото</p>
                        <span class="browse-button">Найти в файлах</span>
                    </div>
                    <input id="file_${Date.now()}" type="file" accept="image/*" name="photo" required />
                </label>
                <div class="input-group wewedf">
                    <input type="text" name="description" autocomplete="off" class="input">
                    <label class="user-label">Описание фотографии</label>
                    <button class="delete-element tooltip">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                        </svg>
                        <span class="tooltiptext">удалить</span>
                    </button>
                </div>
            </form>
        `,
        quoteForm: () => `
            <div class="input-group element" data-type="quote">
                <input required type="text" name="quote" autocomplete="off" class="input">
                <label class="user-label">Цитата</label>
                <button class="delete-element tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                    </svg>
                    <span class="tooltiptext">удалить</span>
                </button>
            </div>
        `
    };

    function updateTime() {
        const datetimeEl = document.getElementById('datetime');
        if (datetimeEl) {
            const now = dayjs().locale('ru').format('HH:mm, DD MMMM');
            datetimeEl.innerHTML = `${now} - Источник:`;
        }
    }

    async function collectFormData(container) {
        const articleTitle = container.querySelector('input[name="article_title"]').value.trim();
        const datetime = container.querySelector('#datetime')?.textContent;
        const technologyCheckbox = container.querySelector('#technology');
        const checkbox = technologyCheckbox ? technologyCheckbox.checked : false;
        const elementsContainer = container.querySelector('.create_elements');
        const elements = [];

        if (!articleTitle) {
            alert('Название статьи обязательно!');
            return null;
        }

        elementsContainer.querySelectorAll('.element').forEach((el, index) => {
            const type = el.dataset.type;
            if (type === 'title') {
                const value = el.querySelector('input[name="title"]')?.value.trim();
                if (value) {
                    elements.push({ type: 'title', value });
                }
            } else if (type === 'text') {
                const value = el.querySelector('textarea[name="text"]')?.value.trim();
                if (value) {
                    elements.push({ type: 'text', value });
                }
            } else if (type === 'photo') {
                const description = el.querySelector('input[name="description"]')?.value.trim() || '';
                const file = el.querySelector('input[name="photo"]')?.files?.[0];
                if (file) {
                    elements.push({ type: 'photo', value: { description, file, index } });
                }
            } else if (type === 'quote') {
                const value = el.querySelector('input[name="quote"]')?.value.trim();
                if (value) {
                    elements.push({ type: 'quote', value });
                }
            }
        });

        if (elements.length === 0) {
            alert('Добавьте хотя бы один элемент (заголовок, текст, фото или цитату)!');
            return null;
        }

        return {
            datetime,
            title: articleTitle,
            elements,
            checkbox
        };
    }

    async function loadArticles() {
        try {
            const response = await fetch('/articles-data', { method: 'GET' });
            if (!response.ok) {
                throw new Error(`HTTP ${response.status}: ${response.statusText}`);
            }
            const articles = await response.json();
            if (!Array.isArray(articles)) {
                throw new Error('Некорректный формат данных статей');
            }
            listArticlesContent.innerHTML = articles.map(article => {
                const firstText = article.content?.elements?.find(el => el.type === 'text')?.value || 'Текст отсутствует';
                const firstImage = article.content?.elements?.find(el => el.type === 'photo')?.value?.filename || '';
                return `
                    <div class="list_of_article">
                        <div class="container_artricle" data-id="${article.id}">
                            <div class="state">
                                <div class="text_information_article">
                                    <h4>${article.title}</h4>
                                    <p>${firstText.slice(0, 100)}...</p>
                                </div>
                                <button class="detele_article_list">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
                                        <path d="M17 17L27 27M27 17L17 27M42 22C42 24.6264 41.4827 27.2272 40.4776 29.6537C39.4725 32.0802 37.9993 34.285 36.1421 36.1421C34.285 37.9993 32.0802 39.4725 29.6537 40.4776C27.2272 41.4827 24.6264 42 22 42C19.3736 42 16.7728 41.4827 14.3463 40.4776C11.9198 39.4725 9.71504 37.9993 7.85786 36.1421C6.00069 34.285 4.5275 32.0802 3.52241 29.6537C2.51732 27.2272 2 24.6264 2 22C2 16.6957 4.10714 11.6086 7.85786 7.85786C11.6086 4.10714 16.6957 2 22 2C27.3043 2 32.3914 4.10714 36.1421 7.85786C39.8929 11.6086 42 16.6957 42 22Z" stroke="#FF5757" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        } catch (err) {
            console.error('Ошибка загрузки статей:', err.message);
            listArticlesContent.innerHTML = `<p>Ошибка загрузки статей: ${err.message}</p>`;
        }
    }

    createArticleBtn.addEventListener('click', () => {
        if (isRendered) return;

        containerForm.innerHTML = templates.articleForm();
        isRendered = true;

        updateTime();
        const createElementsContainer = containerForm.querySelector('.create_elements');

        containerForm.querySelector('#get_title').addEventListener('click', () => {
            createElementsContainer.insertAdjacentHTML('beforeend', templates.titleForm());
        });

        containerForm.querySelector('#get_text').addEventListener('click', () => {
            createElementsContainer.insertAdjacentHTML('beforeend', templates.textForm());
        });

        containerForm.querySelector('#get_download').addEventListener('click', () => {
            createElementsContainer.insertAdjacentHTML('beforeend', templates.downloadForm());
        });

        containerForm.querySelector('#get_quote').addEventListener('click', () => {
            createElementsContainer.insertAdjacentHTML('beforeend', templates.quoteForm());
        });

        containerForm.querySelector('.delete-form').addEventListener('click', () => {
            containerForm.innerHTML = '';
            isRendered = false;
        });

        containerForm.addEventListener('click', (e) => {
            if (e.target.closest('.delete-element')) {
                e.target.closest('.element')?.remove();
            }
        });

        containerForm.querySelector('.add_article').addEventListener('click', async () => {
            const data = await collectFormData(containerForm);
            if (!data) return;

            const formData = new FormData();
            formData.append('datetime', data.datetime || '');
            formData.append('title', data.title);
            formData.append('checkbox', data.checkbox);

            const elements = data.elements.filter(el => {
                if (el.type === 'photo') {
                    return el.value.file;
                }
                return true;
            });

            formData.append('elements', JSON.stringify(elements.map(el => ({
                type: el.type,
                value: el.type === 'photo' ? { description: el.value.description, index: el.value.index } : el.value
            }))));

            let photoCount = 0;
            data.elements.forEach((el) => {
                if (el.type === 'photo' && el.value.file) {
                    formData.append(`photo_${el.value.index}`, el.value.file);
                    photoCount++;
                }
            });

            console.log('Элементы формы:', data.elements);
            data.elements.forEach((el, i) => {
                if (el.type === 'photo') {
                    console.log(`Фото ${i}:`, el.value.file ? el.value.file.name : 'Файл не выбран');
                }
            });

            console.log('Отправляемые данные:', {
                datetime: data.datetime,
                title: data.title,
                elements: elements,
                checkbox: data.checkbox,
                photoCount: photoCount
            });

            console.log('FormData перед отправкой:');
            for (let [key, value] of formData.entries()) {
                console.log(`${key}:`, value instanceof File ? value.name : value);
            }

            try {
                const response = await fetch('/save-article', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();
                if (response.ok) {
                    let message = "Данные сохранены!";
                    if (result.photoCount > 0) {
                        message += ` Загружено ${result.photoCount} ${result.photoCount === 1 ? 'фотография' : 'фотографий'}.`;
                    }
                    alert(message);
                    containerForm.innerHTML = '';
                    isRendered = false;
                    await loadArticles();
                } else {
                    console.error('Ошибка сервера:', result.error, result.details);
                    alert(`Ошибка при сохранении: ${result.error || 'Неизвестная ошибка'}`);
                }
            } catch (err) {
                console.error('Ошибка сети:', err.message);
                alert(`Ошибка сети: ${err.message}. Проверьте, запущен ли сервер.`);
            }
        });
    });

    listArticlesContent.addEventListener('click', async (e) => {
        const container = e.target.closest('.container_artricle');
        const deleteBtn = e.target.closest('.detele_article_list');

        if (container && !deleteBtn) {
            const articleId = container.dataset.id;
            window.location.href = `/article/${articleId}.html`;
        }

        if (deleteBtn) {
            const articleId = deleteBtn.closest('.container_artricle').dataset.id;
            if (confirm('Вы точно хотите удалить эту статью?')) {
                try {
                    const response = await fetch(`/article/${articleId}`, {
                        method: 'DELETE'
                    });
                    const result = await response.json();
                    if (response.ok) {
                        alert(result.message || 'Статья удалена');
                        await loadArticles();
                    } else {
                        console.error('Ошибка удаления:', result.error);
                        alert(result.error || 'Ошибка при удалении статьи');
                    }
                } catch (err) {
                    console.error('Ошибка сети:', err.message);
                    alert(`Ошибка сети при удалении: ${err.message}`);
                }
            }
        }
    });

    loadArticles();
});