const $mobileMenu = document.querySelector('.mobileMenu');
const $darkModeBtn = document.querySelector('.darkMode-btn');

$mobileMenu.addEventListener('click', toggleMenu);
$darkModeBtn.addEventListener('click', toggleDarkMode);

function toggleMenu() {
  $mobileMenu.classList.toggle('active');
}

function toggleDarkMode() {
  document.body.classList.toggle('darkMode');
}
