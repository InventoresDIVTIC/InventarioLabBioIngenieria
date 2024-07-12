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
    var table = $('#usuarios').DataTable({
        responsive: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    }).columns.adjust().responsive.recalc();
});

const thId = document.getElementById('icon-menu-id'); const idIcon = document.getElementById('icon-id');
const thName = document.getElementById('icon-menu-nombre'); const nameIcon = document.getElementById('icon-nombre');
const thLastName = document.getElementById('icon-menu-apellido'); const lastnameIcon = document.getElementById('icon-apellido');
const thEmail = document.getElementById('icon-menu-email'); const emailIcon = document.getElementById('icon-email');
const thRol = document.getElementById('icon-menu-rol'); const rolIcon = document.getElementById('icon-rol');
const thArea = document.getElementById('icon-menu-area'); const areaIcon = document.getElementById('icon-area');

thId.addEventListener('click', () => {
    idIcon.classList.toggle('clicked');
    nameIcon.classList.remove('clicked');
    lastnameIcon.classList.remove('clicked');
    emailIcon.classList.remove('clicked');
    rolIcon.classList.remove('clicked');
    areaIcon.classList.remove('clicked');
});

thName.addEventListener('click', () => {
    nameIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    lastnameIcon.classList.remove('clicked');
    emailIcon.classList.remove('clicked');
    rolIcon.classList.remove('clicked');
    areaIcon.classList.remove('clicked');
});

thLastName.addEventListener('click', () => {
    lastnameIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    emailIcon.classList.remove('clicked');
    rolIcon.classList.remove('clicked');
    areaIcon.classList.remove('clicked');
});

thEmail.addEventListener('click', () => {
    emailIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    lastnameIcon.classList.remove('clicked');
    rolIcon.classList.remove('clicked');
    areaIcon.classList.remove('clicked');
});

thRol.addEventListener('click', () => {
    rolIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    lastnameIcon.classList.remove('clicked');
    emailIcon.classList.remove('clicked');
    areaIcon.classList.remove('clicked');
});

thArea.addEventListener('click', () => {
    areaIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    nameIcon.classList.remove('clicked');
    lastnameIcon.classList.remove('clicked');
    emailIcon.classList.remove('clicked');
    rolIcon.classList.remove('clicked');
});
