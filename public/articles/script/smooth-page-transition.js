document.addEventListener('DOMContentLoaded', () => {
  // Создаем div для эффекта затемнения
  const overlay = document.createElement('div');
  overlay.style.cssText = `
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.5s ease;
    z-index: 9999;
  `;
  document.body.appendChild(overlay);

  // Перехватываем клики по ссылкам
  document.querySelectorAll('a').forEach(link => {
    // Проверяем, что ссылка ведет на страницу в пределах сайта и не является якорной ссылкой
    if (
      link.href &&
      link.href.includes(window.location.origin) &&
      !link.href.startsWith('#') &&
      !link.hash &&
      !link.target &&
      !link.download
    ) {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const destination = link.href;

        // Запускаем анимацию затемнения
        overlay.style.opacity = '1';

        // Ждем завершения анимации и переходим на новую страницу
        setTimeout(() => {
          window.location.href = destination;
        }, 500); // Время должно совпадать с transition в CSS
      });
    }
  });

  // Анимация появления при загрузке страницы
  window.addEventListener('load', () => {
    overlay.style.opacity = '1';
    setTimeout(() => {
      overlay.style.opacity = '0';
    }, 50); // Небольшая задержка для старта анимации
  });
});