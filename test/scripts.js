document.addEventListener('DOMContentLoaded', function() {
    fetchPaquetes();
    fetchConsultas();
});

function fetchPaquetes() {
    fetch('api/paquetes.php')
        .then(response => response.json())
        .then(data => {
            let paquetesLista = document.getElementById('paquetes-lista');
            data.forEach(paquete => {
                let paqueteDiv = document.createElement('div');
                paqueteDiv.className = 'paquete';
                paqueteDiv.innerHTML = `
                    <img src="${paquete.ImagenPaquete}" alt="${paquete.NombrePaquete}">
                    <h3>${paquete.NombrePaquete}</h3>
                    <p>${paquete.DetallesPaquete}</p>
                    <p><strong>Precio:</strong> ${paquete.PrecioPaquete} soles</p>
                `;
                paquetesLista.appendChild(paqueteDiv);
            });
        })
        .catch(error => console.error('Error fetching paquetes:', error));
}

function fetchConsultas() {
    fetch('api/consultas.php')
        .then(response => response.json())
        .then(data => {
            let consultasLista = document.getElementById('consultas-lista');
            data.forEach(consulta => {
                let consultaDiv = document.createElement('div');
                consultaDiv.className = 'consulta';
                consultaDiv.innerHTML = `
                    <h3>${consulta.Asunto}</h3>
                    <p><strong>Nombre:</strong> ${consulta.NombreCompleto}</p>
                    <p><strong>Descripción:</strong> ${consulta.Descripcion}</p>
                    <p><strong>Fecha:</strong> ${consulta.FechaPublicacion}</p>
                `;
                consultasLista.appendChild(consultaDiv);
            });
        })
        .catch(error => console.error('Error fetching consultas:', error));
}
