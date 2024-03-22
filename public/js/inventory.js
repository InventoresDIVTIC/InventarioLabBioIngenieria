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
    var table = $('#activos').DataTable({
        responsive: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    }).columns.adjust().responsive.recalc();
});
 
const thId = document.getElementById('icon-menu-id'); const idIcon = document.getElementById('icon-id');
const thType = document.getElementById('icon-menu-type'); const typeIcon = document.getElementById('icon-type');
const thCategory = document.getElementById('icon-menu-category'); const categoryIcon = document.getElementById('icon-category');
const thBrand = document.getElementById('icon-menu-brand'); const brandIcon = document.getElementById('icon-brand');
const thModel = document.getElementById('icon-menu-model'); const modelIcon = document.getElementById('icon-model');
const thSerial = document.getElementById('icon-menu-serial'); const serialIcon = document.getElementById('icon-serial');
const thLocation = document.getElementById('icon-menu-location'); const locationIcon = document.getElementById('icon-location');
const thSublocation = document.getElementById('icon-menu-sublocation'); const sublocationIcon = document.getElementById('icon-sublocation');
const thStatus = document.getElementById('icon-menu-status'); const statusIcon = document.getElementById('icon-status');
const thUltmprev = document.getElementById('icon-menu-ultmprev'); const ultmprevIcon = document.getElementById('icon-ultmprev');

thId.addEventListener('click', () => {
    idIcon.classList.toggle('clicked');
    typeIcon.classList.remove('clicked');
    categoryIcon.classList.remove('clicked');
    brandIcon.classList.remove('clicked');
    modelIcon.classList.remove('clicked');
    serialIcon.classList.remove('clicked');
    locationIcon.classList.remove('clicked');
    sublocationIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    ultmprevIcon.classList.remove('clicked');
});
thType.addEventListener('click', () => {
    typeIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    categoryIcon.classList.remove('clicked');
    brandIcon.classList.remove('clicked');
    modelIcon.classList.remove('clicked');
    serialIcon.classList.remove('clicked');
    locationIcon.classList.remove('clicked');
    sublocationIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    ultmprevIcon.classList.remove('clicked');
});
thCategory.addEventListener('click', () => {
    categoryIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    typeIcon.classList.remove('clicked');
    brandIcon.classList.remove('clicked');
    modelIcon.classList.remove('clicked');
    serialIcon.classList.remove('clicked');
    locationIcon.classList.remove('clicked');
    sublocationIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    ultmprevIcon.classList.remove('clicked');
});
thBrand.addEventListener('click', () => {
    brandIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    typeIcon.classList.remove('clicked');
    categoryIcon.classList.remove('clicked');
    modelIcon.classList.remove('clicked');
    serialIcon.classList.remove('clicked');
    locationIcon.classList.remove('clicked');
    sublocationIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    ultmprevIcon.classList.remove('clicked');
});
thModel.addEventListener('click', () => {
    modelIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    typeIcon.classList.remove('clicked');
    categoryIcon.classList.remove('clicked');
    brandIcon.classList.remove('clicked');
    serialIcon.classList.remove('clicked');
    locationIcon.classList.remove('clicked');
    sublocationIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    ultmprevIcon.classList.remove('clicked');
});
thSerial.addEventListener('click', () => {
    serialIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    typeIcon.classList.remove('clicked');
    categoryIcon.classList.remove('clicked');
    brandIcon.classList.remove('clicked');
    modelIcon.classList.remove('clicked');
    locationIcon.classList.remove('clicked');
    sublocationIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    ultmprevIcon.classList.remove('clicked');
});
thLocation.addEventListener('click', () => {
    locationIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    typeIcon.classList.remove('clicked');
    categoryIcon.classList.remove('clicked');
    brandIcon.classList.remove('clicked');
    modelIcon.classList.remove('clicked');
    serialIcon.classList.remove('clicked');
    sublocationIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    ultmprevIcon.classList.remove('clicked');
});
thSublocation.addEventListener('click', () => {
    sublocationIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    typeIcon.classList.remove('clicked');
    categoryIcon.classList.remove('clicked');
    brandIcon.classList.remove('clicked');
    modelIcon.classList.remove('clicked');
    serialIcon.classList.remove('clicked');
    locationIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    ultmprevIcon.classList.remove('clicked');
});
thStatus.addEventListener('click', () => {
    statusIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    typeIcon.classList.remove('clicked');
    categoryIcon.classList.remove('clicked');
    brandIcon.classList.remove('clicked');
    modelIcon.classList.remove('clicked');
    serialIcon.classList.remove('clicked');
    locationIcon.classList.remove('clicked');
    sublocationIcon.classList.remove('clicked');
    ultmprevIcon.classList.remove('clicked');
});
thUltmprev.addEventListener('click', () => {
    ultmprevIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    typeIcon.classList.remove('clicked');
    categoryIcon.classList.remove('clicked');
    brandIcon.classList.remove('clicked');
    modelIcon.classList.remove('clicked');
    serialIcon.classList.remove('clicked');
    locationIcon.classList.remove('clicked');
    sublocationIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
});

