function seleccionar(link) {
    var opciones = document.querySelectorAll('#navbarNav .nav-link');
    opciones.forEach(opcion => {
        opcion.classList.remove("seleccionado");
    });
    link.classList.add("seleccionado");
}
