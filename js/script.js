const urlParams = new URLSearchParams(window.location.search);
const enviado = urlParams.get('enviado');

// Mostrar una alerta si el parámetro 'enviado' es verdadero
if (enviado === 'true') {
  alert('Formulario enviado correctamente');
}

function seleccionar(link) {
    var opciones = document.querySelectorAll('#navbarNav .nav-link');
    opciones.forEach(opcion => {
        opcion.classList.remove("seleccionado");
    });
    link.classList.add("seleccionado");
}
window.addEventListener('DOMContentLoaded', function() {
  // Obtener el parámetro 'enviado' de la URL
  const urlParams = new URLSearchParams(window.location.search);
  const enviado = urlParams.get('enviado');

  // Mostrar una alerta si el parámetro 'enviado' es verdadero
  if (enviado === 'true') {
    alert('Formulario enviado correctamente');
  }
});
document.getElementById('btn-sol').addEventListener('click', function() {
    document.body.style.backgroundColor = "#333333";
    document.querySelectorAll('.letreros').forEach(function(letrero) {
        letrero.style.color = "#FFFFFF"; // Amarillo
        
    });
});

document.getElementById('btn-nube').addEventListener('click', function() {
    document.body.style.backgroundColor = "#2C3E50"; // Azul
    document.querySelectorAll('.letreros').forEach(function(letrero) {
        letrero.style.color = '#FFFFFF'; // Azul
        
    });
});

document.getElementById('btn-luna').addEventListener('click', function() {
    document.body.style.backgroundColor = "#9B59B6";
    document.querySelectorAll('.letreros').forEach(function(letrero) {
        letrero.style.color = "#333333"; // Morado
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var loginButton = document.getElementById("loginButton");
    loginButton.addEventListener("click", function() {
        window.location.href = "login.html";
    });
});
