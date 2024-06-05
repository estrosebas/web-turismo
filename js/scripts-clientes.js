
document.addEventListener('DOMContentLoaded', function() {
    // Modal de Reserva
    $('#reservaModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var title = button.data('title'); 
        var description = button.data('description');
        
        var modal = $(this);
        modal.find('.modal-title').text(title);
        modal.find('.modal-body #modalTitle').text(title);
        modal.find('.modal-body #modalDescription').text(description);
    });

    // Modal de Cuenta
    $('#cuentaModal').on('show.bs.modal', function (event) {

        var accountName = "Sebastián";
        var accountEmail = "sebastian@example.com";

        var modal = $(this);
        modal.find('#accountName').text(accountName);
        modal.find('#accountEmail').text(accountEmail);
    });
});
