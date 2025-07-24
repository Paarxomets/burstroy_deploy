const MobileNavigation = document.querySelector('.mobile_header_navigation');
const burger = document.querySelector('.burger');
const CloseMobNav = document.querySelector('.close_mobile_navigation');

burger.addEventListener('click', () => {
  MobileNavigation.classList.toggle('active');
});

CloseMobNav.addEventListener('click', () => {
  MobileNavigation.classList.remove('active');
});
document.documentElement.style.overflowX = 'hidden';
document.body.style.overflowX = 'hidden';
window.addEventListener('resize', () => {
    document.documentElement.style.overflowX = 'hidden';
    document.body.style.overflowX = 'hidden';
});