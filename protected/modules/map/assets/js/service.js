var ip_interna = "http://172.17.1.18:8090/";
var ip_publica = "http://200.48.7.35:8090/";
function reservarHotel(id_hotel) {
    $.post(Request.BaseUrl + "/map/principal/ReservHotel", {id_hotel: id_hotel}, function (result) {
        bootbox.dialog({
            closeButton: false,
            message: result.layer
        });
        $("#btn_close").on("click", function () {
            bootbox.hideAll();
        });

        $("#btn_save").on("click", function () {
            $.post(Request.BaseUrl + "/map/principal/SaveReserva", $("#frmReserva").serialize(), function (result) {
                if (result.status === true) {
                    bootbox.hideAll();
                    $.post(Request.BaseUrl + '/map/principal/print', {id_reserva: result.IDRESERVA}, function (data) {
                        if (data.estado) {
                            pdfMake.createPdf({
                                content: data.content,
                                styles: {
                                },
                                pageMargins: [40, 40, 40, 40]
                            }).download("RESERVA_HABITACION");
                        }
                    }, 'json');
                } else {
                    var options = [];
                }
            }, 'json');
        });
    }, 'json');
}
function verCartaRestaurante(id_restaurante) {
    $.post(Request.BaseUrl + "/map/principal/CartaRestaurante", {id_restaurante: id_restaurante}, function (result) {
        bootbox.dialog({
            closeButton: false,
            message: result.layer
        });
        $.ajax({
            type: "GET",
            contentType: "application/json; chartset=utf-8",
            url: ip_publica + "apiUpc/api/cartabyid/" + id_restaurante,
            dataType: "json",
            success: function (data) {
                var html_carta = "";
                $.each(data, function (i, item) {
                    html_carta += "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                    html_carta += item.descripcion;
                    html_carta += "<span class='badge badge-primary badge-pill'>S/." + item.precio + "</span>";
                    html_carta += "</li>";
                });
                $("#divCarta").html(html_carta);
            }
        });

        $("#btn_close").on("click", function () {
            bootbox.hideAll();
        });
    }, 'json');
}

var region = $("#nombre_region").val();
var promise = $.ajax({
    type: "GET",
    contentType: "application/json; chartset=utf-8",
    url: ip_publica + "apiUpc/api/regionesnombre/" + region,
    dataType: "json",
    success: function (data) {
        var descripcion = "";
        var nombre_region = "";
        var alias = "";
        var id_region = "";
        $.each(data, function (i, item) {
            descripcion = item.descripcion;
            nombre_region = item.nombreRegion;
            alias = item.aliasRegion;
            id_region = item.idRegion;
        });
        $("#nombreRegion").text(nombre_region.toUpperCase());
        $("#aliasRegion").text(alias.toUpperCase());
        $("#descripcionRegion").text(descripcion);
        $("#id_region").val(id_region);
    }
});
promise.then(function () {
    var id_regiona = $("#id_region").val();
    $.ajax({
        type: "GET",
        contentType: "application/json; charset=utf-8",
        url: ip_publica + "apiUpc/api/hotelesbyid/" + id_regiona,
        dataType: "json",
        success: function (data) {
            var html_hotel = "";
            var html_rest = "";
            $.each(data, function (i, item) {
                html_hotel += "<div  class='company-stat-box m-t-15 active padding-20 bg-master-lightest'>";
                html_hotel += "<button type='button' class='close' data-dismiss='modal'>";
                html_hotel += "<i class='pg-close fs-12'></i>";
                html_hotel += "</button>";
                html_hotel += "<p class='company-name pull-left text-uppercase bold no-margin'>";
                html_hotel += "<span class='fa fa-circle text-success fs-11'></span> " + item.nombreHotel;
                html_hotel += "</p>";
                html_hotel += "<small class='hint-text m-l-10'>S/" + item.precio + "</small>";
                html_hotel += "<div class='clearfix'></div>";
                html_hotel += "<div class='m-t-10'>";
                html_hotel += "<p class='pull-left small hint-text no-margin p-t-5'>" + item.direccionHotel + "</p>";
                html_hotel += "<div class='pull-right'>";
                html_hotel += "<p class='small hint-text no-margin inline'><b>Atención</b> 11am - 9pm </p>";
                html_hotel += "<button type='button' onclick='reservarHotel(" + item.idHotel + ")' class='btn btn-success btn-xs'> Reservar</button>";
                html_hotel += "</div>";
                html_hotel += "<div class='clearfix'></div>";
                html_hotel += "</div>";
                html_hotel += "</div>";
            });
            $("#divHospedaje").html(html_hotel);
//            $("#divRestaurante").html(html_rest);
        }
    });
});
promise.then(function () {
    var id_region_rest = $("#id_region").val();
    $.ajax({
        type: "GET",
        contentType: "application/json; charset=utf-8",
        url: ip_publica + "apiUpc/api/restaurantebyid/" + id_region_rest,
        dataType: "json",
        success: function (data) {
            var html_rest = "";
            $.each(data, function (i, item) {
                html_rest += "<div  class='company-stat-box m-t-15 active padding-20 bg-master-lightest'>";
                html_rest += "<button type='button' class='close' data-dismiss='modal'>";
                html_rest += "<i class='pg-close fs-12'></i>";
                html_rest += "</button>";
                html_rest += "<p class='company-name pull-left text-uppercase bold no-margin'>";
                html_rest += "<span class='fa fa-circle text-success fs-11'></span> " + item.descripcionRestaurante;
                html_rest += "</p>";
                html_rest += "<small class='hint-text m-l-10'>" + item.tipoComida + "</small>";
                html_rest += "<div class='clearfix'></div>";
                html_rest += "<div class='m-t-10'>";
                html_rest += "<p class='pull-left small hint-text no-margin p-t-5'>" + item.direccionRestaurante + "</p>";
                html_rest += "<div class='pull-right'>";
                html_rest += "<p class='small hint-text no-margin inline'><b>Atención</b> " + item.horarioAtencion + "</p>";
                html_rest += "<button type='button' onclick='verCartaRestaurante(" + item.idRestaurante + ")' class='btn btn-danger btn-xs'> Ver Carta</button>";
                html_rest += "</div>";
                html_rest += "<div class='clearfix'></div>";
                html_rest += "</div>";
                html_rest += "</div>";
            });
            $("#divRestaurante").html(html_rest);
        }
    });
});
promise.then(function () {
    var id_region_turismo = $("#id_region").val();
    $.ajax({
        type: "GET",
        contentType: "application/json; charset=utf-8",
        url: ip_publica + "apiUpc/api/turismobyid/" + id_region_turismo,
        dataType: "json",
        success: function (data) {
            var html_turismo = "";
            $.each(data, function (i, item) {
                html_turismo += "<div  class='company-stat-box m-t-15 active padding-20 bg-master-lightest'>";
                html_turismo += "<button type='button' class='close' data-dismiss='modal'>";
                html_turismo += "<i class='pg-close fs-12'></i>";
                html_turismo += "</button>";
                html_turismo += "<p class='company-name pull-left text-uppercase bold no-margin'>";
                html_turismo += "<span class='fa fa-circle text-success fs-11'></span> " + item.nombreTurismo;
                html_turismo += "</p>";
                html_turismo += "<small class='hint-text m-l-10'>" + item.nombreTurismo + "</small>";
                html_turismo += "<div class='clearfix'></div>";
                html_turismo += "<div class='m-t-10'>";
                html_turismo += "<p class='pull-left small hint-text no-margin p-t-5'>" + item.ubicaconTurismo + "</p>";
//                html_rest += "<div class='pull-right'>";
//                html_rest += "<p class='small hint-text no-margin inline'><b>Atención</b> "+item.horarioAtencion+"</p>";
//                html_rest += "<button type='button' onclick='verCartaRestaurante(" + item.idRestaurante + ")' class='btn btn-danger btn-xs'> Ver Carta</button>";
//                html_rest += "</div>";
                html_turismo += "<div class='clearfix'></div>";
                html_turismo += "</div>";
                html_turismo += "</div>";
            });
            $("#divTurismo").html(html_turismo);
        }
    });
});

