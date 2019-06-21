var dialog = bootbox.dialog({
    title: 'Validación',
    message: '<center><p><i class="fa fa-spin fa-spinner"></i> Verificando información...</p></center>',
});

dialog.init(function () {
    setTimeout(function () {
        dialog.find('.bootbox-body').html("<div class='alert alert-success' role='alert'><strong>Correcto: </strong>Reserva verificada correctamente</div>");
    }, 2000);
    setTimeout(function () {
        bootbox.hideAll();
        $("#estadoReserva").show();
    }, 4000);
});

