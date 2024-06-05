function showSection(sectionId) {
  // Oculta el div de bienvenida
  document.getElementById('bienvenida').style.display = 'none';

  // Oculta todas las secciones
  document.querySelectorAll('.section').forEach(section => {
    section.style.display = 'none';
  });

  // Muestra la sección correspondiente
  document.getElementById(sectionId).style.display = 'block';
}


function buscarLugar() {
    var nombreLugar = document.getElementById('buscar-lugar').value;
    document.getElementById('formulario-modificar-lugar').style.display = 'block';
}
function buscarCliente() {
    var nombreCliente = document.getElementById('buscar-cliente').value;
    document.getElementById = document.getElementById('formulario-modificar-cliente').style.display = 'block';
}
