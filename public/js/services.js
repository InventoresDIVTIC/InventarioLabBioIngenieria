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
    var table = $('#servicios').DataTable({
        responsive: true,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    }).columns.adjust().responsive.recalc();
});

const thId = document.getElementById('icon-menu-id'); const idIcon = document.getElementById('icon-id');
const thFolio = document.getElementById('icon-menu-folio'); const folioIcon = document.getElementById('icon-folio');
const thCuenta = document.getElementById('icon-menu-cuenta'); const cuentaIcon = document.getElementById('icon-cuenta');
const thTiposervicio = document.getElementById('icon-menu-tiposervicio'); const tiposervicioIcon = document.getElementById('icon-tiposervicio');
const thTipoactivo = document.getElementById('icon-menu-tipoactivo'); const tipoactivoIcon = document.getElementById('icon-tipoactivo');
const thIngasig = document.getElementById('icon-menu-ing-asig'); const ingasigIcon = document.getElementById('icon-ing-asig');
const thModelo = document.getElementById('icon-menu-modelo'); const modeloIcon = document.getElementById('icon-modelo');
const thSububicacion = document.getElementById('icon-menu-sububicacion'); const sububicacionIcon = document.getElementById('icon-sububicacion');
const thStatus = document.getElementById('icon-menu-status'); const statusIcon = document.getElementById('icon-status');
const thFechaprogramada = document.getElementById('icon-menu-fechaprogramada'); const fechaprogramadaIcon = document.getElementById('icon-fechaprogramada');
const thFechaconclusion = document.getElementById('icon-menu-fechaconclusion'); const fechaconclusionIcon = document.getElementById('icon-fechaconclusion');

thId.addEventListener('click', () => {
    idIcon.classList.toggle('clicked');
    folioIcon.classList.remove('clicked');
    cuentaIcon.classList.remove('clicked');
    tiposervicioIcon.classList.remove('clicked');
    tipoactivoIcon.classList.remove('clicked');
    ingasigIcon.classList.remove('clicked');
    modeloIcon.classList.remove('clicked');
    sububicacionIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    fechaprogramadaIcon.classList.remove('clicked');
    fechaconclusionIcon.classList.remove('clicked');
});
thFolio.addEventListener('click', () => {
    folioIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    cuentaIcon.classList.remove('clicked');
    tiposervicioIcon.classList.remove('clicked');
    tipoactivoIcon.classList.remove('clicked');
    ingasigIcon.classList.remove('clicked');
    modeloIcon.classList.remove('clicked');
    sububicacionIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    fechaprogramadaIcon.classList.remove('clicked');
    fechaconclusionIcon.classList.remove('clicked');
});
thCuenta.addEventListener('click', () => {
    cuentaIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    folioIcon.classList.remove('clicked');
    tiposervicioIcon.classList.remove('clicked');
    tipoactivoIcon.classList.remove('clicked');
    ingasigIcon.classList.remove('clicked');
    modeloIcon.classList.remove('clicked');
    sububicacionIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    fechaprogramadaIcon.classList.remove('clicked');
    fechaconclusionIcon.classList.remove('clicked');
});
thTiposervicio.addEventListener('click', () => {
    tiposervicioIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    folioIcon.classList.remove('clicked');
    cuentaIcon.classList.remove('clicked');
    tipoactivoIcon.classList.remove('clicked');
    ingasigIcon.classList.remove('clicked');
    modeloIcon.classList.remove('clicked');
    sububicacionIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    fechaprogramadaIcon.classList.remove('clicked');
    fechaconclusionIcon.classList.remove('clicked');
});
thTipoactivo.addEventListener('click', () => {
    tipoactivoIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    folioIcon.classList.remove('clicked');
    cuentaIcon.classList.remove('clicked');
    tiposervicioIcon.classList.remove('clicked');
    ingasigIcon.classList.remove('clicked');
    modeloIcon.classList.remove('clicked');
    sububicacionIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    fechaprogramadaIcon.classList.remove('clicked');
    fechaconclusionIcon.classList.remove('clicked');
});
thIngasig.addEventListener('click', () => {
    ingasigIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    folioIcon.classList.remove('clicked');
    cuentaIcon.classList.remove('clicked');
    tiposervicioIcon.classList.remove('clicked');
    tipoactivoIcon.classList.remove('clicked');
    modeloIcon.classList.remove('clicked');
    sububicacionIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    fechaprogramadaIcon.classList.remove('clicked');
    fechaconclusionIcon.classList.remove('clicked');
});
thModelo.addEventListener('click', () => {
    modeloIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    folioIcon.classList.remove('clicked');
    cuentaIcon.classList.remove('clicked');
    tiposervicioIcon.classList.remove('clicked');
    tipoactivoIcon.classList.remove('clicked');
    ingasigIcon.classList.remove('clicked');
    sububicacionIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    fechaprogramadaIcon.classList.remove('clicked');
    fechaconclusionIcon.classList.remove('clicked');
});
thSububicacion.addEventListener('click', () => {
    sububicacionIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    folioIcon.classList.remove('clicked');
    cuentaIcon.classList.remove('clicked');
    tiposervicioIcon.classList.remove('clicked');
    tipoactivoIcon.classList.remove('clicked');
    ingasigIcon.classList.remove('clicked');
    modeloIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    fechaprogramadaIcon.classList.remove('clicked');
    fechaconclusionIcon.classList.remove('clicked');
});
thStatus.addEventListener('click', () => {
    statusIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    folioIcon.classList.remove('clicked');
    cuentaIcon.classList.remove('clicked');
    tiposervicioIcon.classList.remove('clicked');
    tipoactivoIcon.classList.remove('clicked');
    ingasigIcon.classList.remove('clicked');
    modeloIcon.classList.remove('clicked');
    sububicacionIcon.classList.remove('clicked');
    fechaprogramadaIcon.classList.remove('clicked');
    fechaconclusionIcon.classList.remove('clicked');
});
thFechaprogramada.addEventListener('click', () => {
    fechaprogramadaIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    folioIcon.classList.remove('clicked');
    cuentaIcon.classList.remove('clicked');
    tiposervicioIcon.classList.remove('clicked');
    tipoactivoIcon.classList.remove('clicked');
    ingasigIcon.classList.remove('clicked');
    modeloIcon.classList.remove('clicked');
    sububicacionIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    fechaconclusionIcon.classList.remove('clicked');
});
thFechaconclusion.addEventListener('click', () => {
    fechaconclusionIcon.classList.toggle('clicked');
    idIcon.classList.remove('clicked');
    folioIcon.classList.remove('clicked');
    cuentaIcon.classList.remove('clicked');
    tiposervicioIcon.classList.remove('clicked');
    tipoactivoIcon.classList.remove('clicked');
    ingasigIcon.classList.remove('clicked');
    modeloIcon.classList.remove('clicked');
    sububicacionIcon.classList.remove('clicked');
    statusIcon.classList.remove('clicked');
    fechaprogramadaIcon.classList.remove('clicked');
});
