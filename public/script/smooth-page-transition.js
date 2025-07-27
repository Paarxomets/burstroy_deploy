// document.addEventListener('DOMContentLoaded', () => {
//   // Создаем div для эффекта затемнения
//   const overlay = document.createElement('div');
//   overlay.style.cssText = `
//     position: fixed;
//     top: 0;
//     left: 0;
//     width: 100%;
//     height: 100%;
//     background: white;
//     opacity: 0;
//     pointer-events: none;
//     transition: opacity 0.5s ease;
//     z-index: 9999;
//   `;
//   document.body.appendChild(overlay);

//   // Делегирование событий для перехвата кликов по ссылкам
//   document.addEventListener('click', (e) => {
//     const link = e.target.closest('a');
//     if (
//       link &&
//       link.href &&
//       link.href.includes(window.location.origin) &&
//       !link.href.startsWith('#') &&
//       !link.target &&
//       !link.download
//     ) {
//       e.preventDefault();
//       const destination = link.href;
//       overlay.style.opacity = '1';

//       // Ждем завершения анимации через transitionend
//       overlay.addEventListener('transitionend', () => {
//         window.location.href = destination;
//       }, { once: true });
//     }
//   });

//   // Анимация появления при загрузке или возврате назад
//   window.addEventListener('pageshow', (e) => {
//     if (e.persisted) {
//       // Страница восстановлена из кэша, сбрасываем оверлей
//       overlay.style.opacity = '0';
//     } else {
//       // Новая загрузка страницы
//       overlay.style.opacity = '1';
//       setTimeout(() => {
//         overlay.style.opacity = '0';
//       }, 50);
//     }
//   });
// });