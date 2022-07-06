const $mobileMenu = document.querySelector('.mobileMenu');
$mobileMenu.addEventListener('click', toggleMenu);

function toggleMenu() {
  $mobileMenu.classList.toggle('active');
}
