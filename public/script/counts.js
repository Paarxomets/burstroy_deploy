async function countArticles() {
            try {
                const response = await fetch('/data_article.json');
                if (!response.ok) {
                    throw new Error('Не удалось загрузить файл');
                }
                const articles = await response.json();
                
                const totalArticlesCount = articles.length;
                document.getElementById('articleCount').textContent = totalArticlesCount;
                
                const checkedArticlesCount = articles.filter(article => article.checkbox === true).length;
                document.getElementById('articleTechnologyCount').textContent = checkedArticlesCount;
            } catch (error) {
                console.error('Ошибка:', error);
                document.getElementById('articleCount').textContent = 'Ошибка';
                document.getElementById('articleTechnologyCount').textContent = 'Ошибка';
            }
        }

        document.addEventListener('DOMContentLoaded', countArticles);