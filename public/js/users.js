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
    var table = $('#users').DataTable({
        responsive: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    }).columns.adjust().responsive.recalc();
});

const thId = document.getElementById('icon-menu-id'); const idIcon = document.getElementById('icon-id');
const thIdUser = document.getElementById('icon-menu-id-user'); const iduserIcon = document.getElementById('icon-id-user');
const thIdActive = document.getElementById('icon-menu-id-active'); const idactiveIcon = document.getElementById('icon-id-active');
const thRequest = document.getElementById('icon-menu-request'); const requestIcon = document.getElementById('icon-request');
const thTypeRequest = document.getElementById('icon-menu-type-request'); const typerequestIcon = document.getElementById('icon-type-request');
const thPriority = document.getElementById('icon-menu-priority'); const priorityIcon = document.getElementById('icon-priority');
const thCreated = document.getElementById('icon-menu-created'); const createdIcon = document.getElementById('icon-created');
const thStatus = document.getElementById('icon-menu-status'); const statusIcon = document.getElementById('icon-status');

thId.addEventListener('click', () => {
    idIcon.classList.toggle('clicked');
    iduserIcon.classList.remove('clicked');
    idactiveIcon.classList.remove('clicked');
    requestIcon.classList.remove('clicked');
    typerequestIcon.classList.remove('clicked');
    priorityIcon.classList.remove('clicked');
    createdIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
});
thIdUser.addEventListener('click', () => {
    iduserIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    idactiveIcon.classList.remove('clicked');
    requestIcon.classList.remove('clicked');
    typerequestIcon.classList.remove('clicked');
    priorityIcon.classList.remove('clicked');
    createdIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
});
thIdActive.addEventListener('click', () => {
    idactiveIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    iduserIcon.classList.remove('clicked');
    requestIcon.classList.remove('clicked');
    typerequestIcon.classList.remove('clicked');
    priorityIcon.classList.remove('clicked');
    createdIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
});
thRequest.addEventListener('click', () => {
    requestIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    iduserIcon.classList.remove('clicked');
    idactiveIcon.classList.remove('clicked');
    typerequestIcon.classList.remove('clicked');
    priorityIcon.classList.remove('clicked');
    createdIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
});
thTypeRequest.addEventListener('click', () => {
    typerequestIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    iduserIcon.classList.remove('clicked');
    idactiveIcon.classList.remove('clicked');
    requestIcon.classList.remove('clicked');
    priorityIcon.classList.remove('clicked');
    createdIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
});
thPriority.addEventListener('click', () => {
    priorityIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    iduserIcon.classList.remove('clicked');
    idactiveIcon.classList.remove('clicked');
    requestIcon.classList.remove('clicked');
    typerequestIcon.classList.remove('clicked');
    createdIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
});
thCreated.addEventListener('click', () => {
    createdIcon.classList.toggle('clicked');
    priorityIcon.classList.remove('clicked');
    idIcon.classList.remove('clicked');
    iduserIcon.classList.remove('clicked');
    idactiveIcon.classList.remove('clicked');
    requestIcon.classList.remove('clicked');
    typerequestIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
});
thStatus.addEventListener('click', () => {
    statusIcon.classList.toggle('clicked');
    priorityIcon.classList.remove('clicked');
    idIcon.classList.remove('clicked');
    iduserIcon.classList.remove('clicked');
    idactiveIcon.classList.remove('clicked');
    requestIcon.classList.remove('clicked');
    typerequestIcon.classList.remove('clicked');
    createdIcon.classList.remove('clicked');
});
