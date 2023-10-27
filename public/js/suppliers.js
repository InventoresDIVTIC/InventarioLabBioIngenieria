var floatingButton = document.querySelector('.floating-button');
var floatingMessage = document.querySelector('.floating-message');

floatingButton.addEventListener('mouseover', function() {
    floatingMessage.style.opacity = 1;
    floatingMessage.style.visibility = 'visible';
});

floatingButton.addEventListener('mouseout', function() {
    floatingMessage.style.opacity = 0;
    floatingMessage.style.visibility = 'hidden';
});

$(document).ready(function() {
    var table = $('#proveedores').DataTable({
        responsive: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    }).columns.adjust().responsive.recalc();
});

const thId = document.getElementById('icon-menu-id'); const idIcon = document.getElementById('icon-id');
const thName = document.getElementById('icon-menu-name'); const nameIcon = document.getElementById('icon-name');
const thRazon = document.getElementById('icon-menu-razon'); const razonIcon = document.getElementById('icon-razon');
const thCity = document.getElementById('icon-menu-city'); const cityIcon = document.getElementById('icon-city');
const thState = document.getElementById('icon-menu-state'); const stateIcon = document.getElementById('icon-state');
const thCountry = document.getElementById('icon-menu-country'); const countryIcon = document.getElementById('icon-country');
const thPhone = document.getElementById('icon-menu-phone'); const phoneIcon = document.getElementById('icon-phone');
const thWeb = document.getElementById('icon-menu-web'); const webIcon = document.getElementById('icon-web');
const thEmailcomercial = document.getElementById('icon-menu-emailcomercial'); const emailcomercialIcon = document.getElementById('icon-emailcomercial');

thId.addEventListener('click', () => {
    idIcon.classList.toggle('clicked');
    nameIcon.classList.remove('clicked');
    razonIcon.classList.remove('clicked');
    cityIcon.classList.remove('clicked');
    stateIcon.classList.remove('clicked');
    countryIcon.classList.remove('clicked');
    phoneIcon.classList.remove('clicked');
    webIcon.classList.remove('clicked');
    emailcomercialIcon.classList.remove('clicked');
});
thName.addEventListener('click', () => {
    nameIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    razonIcon.classList.remove('clicked');
    cityIcon.classList.remove('clicked');
    stateIcon.classList.remove('clicked');
    countryIcon.classList.remove('clicked');
    phoneIcon.classList.remove('clicked');
    webIcon.classList.remove('clicked');
    emailcomercialIcon.classList.remove('clicked');
});
thRazon.addEventListener('click', () => {
    razonIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    cityIcon.classList.remove('clicked');
    stateIcon.classList.remove('clicked');
    countryIcon.classList.remove('clicked');
    phoneIcon.classList.remove('clicked');
    webIcon.classList.remove('clicked');
    emailcomercialIcon.classList.remove('clicked');
});
thCity.addEventListener('click', () => {
    cityIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    razonIcon.classList.remove('clicked');
    stateIcon.classList.remove('clicked');
    countryIcon.classList.remove('clicked');
    phoneIcon.classList.remove('clicked');
    webIcon.classList.remove('clicked');
    emailcomercialIcon.classList.remove('clicked');
});
thState.addEventListener('click', () => {
    stateIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    razonIcon.classList.remove('clicked');
    cityIcon.classList.remove('clicked');
    countryIcon.classList.remove('clicked');
    phoneIcon.classList.remove('clicked');
    webIcon.classList.remove('clicked');
    emailcomercialIcon.classList.remove('clicked');
});
thCountry.addEventListener('click', () => {
    countryIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    razonIcon.classList.remove('clicked');
    cityIcon.classList.remove('clicked');
    stateIcon.classList.remove('clicked');
    phoneIcon.classList.remove('clicked');
    webIcon.classList.remove('clicked');
    emailcomercialIcon.classList.remove('clicked');
});
thPhone.addEventListener('click', () => {
    phoneIcon.classList.toggle('clicked');
    countryIcon.classList.remove('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    razonIcon.classList.remove('clicked');
    cityIcon.classList.remove('clicked');
    stateIcon.classList.remove('clicked');
    webIcon.classList.remove('clicked');
    emailcomercialIcon.classList.remove('clicked');
});
thWeb.addEventListener('click', () => {
    webIcon.classList.toggle('clicked');
    countryIcon.classList.remove('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    razonIcon.classList.remove('clicked');
    cityIcon.classList.remove('clicked');
    stateIcon.classList.remove('clicked');
    phoneIcon.classList.remove('clicked');
    emailcomercialIcon.classList.remove('clicked');
});
thEmailcomercial.addEventListener('click', () => {
    emailcomercialIcon.classList.toggle('clicked');
    countryIcon.classList.remove('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    razonIcon.classList.remove('clicked');
    cityIcon.classList.remove('clicked');
    stateIcon.classList.remove('clicked');
    phoneIcon.classList.remove('clicked');
    webIcon.classList.remove('clicked');
});