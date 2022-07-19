const $mobileMenu = document.querySelector('.mobileMenu');
const $darkModeBtn = document.querySelector('.darkMode-btn');
const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
const $contactMethods = document.querySelectorAll(
  'input[name="contact[contact]"]'
);

if (prefersDarkMode.matches) document.body.classList.add('darkMode');

$mobileMenu.addEventListener('click', toggleMenu);
$darkModeBtn.addEventListener('click', toggleDarkMode);

function toggleMenu() {
  $mobileMenu.classList.toggle('active');
}

function toggleDarkMode() {
  document.body.classList.toggle('darkMode');
}

$contactMethods.forEach(input => {
  input.addEventListener('click', showContactMethod);
});

function showContactMethod(e) {
  const $contactContainer = document.querySelector('#contactContainer');

  if (e.target.value === 'phone') {
    $contactContainer.innerHTML = `
      <label for="phoneNumber">Teléfono</label>
      <input type="tel" name="contact[phoneNumber]" id="phoneNumber" placeholder="521468354" />

      <p>Seleccione la fecha y hora de su preferencia</p>

      <label for="date">Fecha</label>
      <input type="date" name="contact[date]" id="date" />

      <label for="hour">Hora</label>
      <input type="time" name="contact[hour]" id="hour" min="09:00" max="18:00" />
    `;
  } else {
    $contactContainer.innerHTML = `
      <label for="email">Correo electrónico</label>
      <input type="email" name="contact[email]" id="email" placeholder="email@email.com" required />
    `;
  }
}
