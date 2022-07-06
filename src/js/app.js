const $mobileMenu = document.querySelector('.mobileMenu');
const $darkModeBtn = document.querySelector('.darkMode-btn');
const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

if (prefersDarkMode.matches) document.body.classList.add('darkMode');

$mobileMenu.addEventListener('click', toggleMenu);
$darkModeBtn.addEventListener('click', toggleDarkMode);

function toggleMenu() {
  $mobileMenu.classList.toggle('active');
}

function toggleDarkMode() {
  document.body.classList.toggle('darkMode');
}
