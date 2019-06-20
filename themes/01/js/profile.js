/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($) {

    // Defining our jQuery plugin

    $.fn.paulund_modal_box = function (prop) {

        // Default parameters

        var options = $.extend({
            height: "150",
            width: "400",
            title: "",
            description: '<div clas="row" style="text-align: center">Cargando... por favor espere<br><img class="image-responsive-height demo-mw-50" src="/ggdelc/themes/01//img/demo/progress.svg" alt="Progress"></div>',
            top: "50%",
            left: "50%",
        }, prop);

        return this.click(function (e) {
            add_block_page();
            add_popup_box();
            add_styles();

            $('.paulund_modal_box').fadeIn();
        });

        function add_styles() {
            $('.paulund_modal_box').css({
                'position': 'absolute',
                'left': options.left,
                'top': options.top,
                'display': 'none',
//                'height': options.height + 'px',
                'width': options.width + 'px',
                'border': '1px solid #fff',
                'box-shadow': '0px 2px 7px #292929',
                '-moz-box-shadow': '0px 2px 7px #292929',
                '-webkit-box-shadow': '0px 2px 7px #292929',
                'border-radius': '10px',
                '-moz-border-radius': '10px',
                '-webkit-border-radius': '10px',
                'background': '#f2f2f2',
                'z-index': '50',
            });
            $('.paulund_modal_close').css({
                'position': 'relative',
                'top': '-25px',
                'left': '20px',
                'float': 'right',
                'display': 'block',
                'height': '50px',
                'width': '50px',
                'background': ' no-repeat',
            });
            /*Block page overlay*/
            var pageHeight = $(document).height();
            var pageWidth = $(window).width();

            $('.paulund_block_page').css({
                'position': 'absolute',
                'top': '0',
                'left': '0',
                'background-color': 'rgba(0,0,0,0.6)',
                'height': pageHeight,
                'width': pageWidth,
                'z-index': '10'
            });
//            $('.paulund_inner_modal_box').css({
//                'background-color': '#fff',
//                'height': (options.height - 50) + 'px',
//                'width': (options.width - 50) + 'px',
//                'padding': '10px',
//                'margin': '15px',
//                'border-radius': '10px',
//                '-moz-border-radius': '10px',
//                '-webkit-border-radius': '10px'
//            });
        }

        function add_block_page() {
            var block_page = $('<div class="paulund_block_page"></div>');

            $(block_page).appendTo('body');
        }

        function add_popup_box() {
            var pop_up = $('<div class="paulund_modal_box"><a href="#" class="paulund_modal_close"></a><div class="paulund_inner_modal_box"><h2>' + options.title + '</h2><p>' + options.description + '</p></div></div>');
            $(pop_up).appendTo('.paulund_block_page');

            $('.paulund_modal_close').click(function () {
                $(this).parent().fadeOut().remove();
                $('.paulund_block_page').fadeOut().remove();
            });
        }

        return this;
    };

})(jQuery);


$(window).ready(function () {
    profile_permits();
});

var profile_permits = function () {
    $.post(Request.BaseUrl + "/" + Request.UrlHash.m + "/" + Request.UrlHash.c + "/access", {}, function (result) {
        if (result.STATE) {
            var data = result.ACCIONES;
            for (var i in data) {
                $(".accion_" + data[i].CLASE_ACCION).attr("disabled", "disabled");
                $(".accion_" + data[i].CLASE_ACCION).addClass("profile_bloqued");
                $(".accion_" + data[i].CLASE_ACCION).attr("style", "pointer-events: auto;");
                $(".accion_" + data[i].CLASE_ACCION).attr("title", "No tiene los permisos requeridos");
            }
        }
    }, 'json');

    $(".profile_bloqued").on("click", function (e) {
        e.preventDefault();
    });
};


jQuery.fn.contentChange = function (callback) {
    var elms = jQuery(this);
    elms.each(
            function (i) {
                var elm = jQuery(this);
                elm.data("lastContents", elm.html());
                window.watchContentChange = window.watchContentChange ? window.watchContentChange : [];
                window.watchContentChange.push({"element": elm, "callback": callback});
            }
    )
    return elms;
};

setInterval(function () {
    if (window.watchContentChange) {
        for (i in window.watchContentChange) {
            if (window.watchContentChange[i].element.data("lastContents") != window.watchContentChange[i].element.html()) {
                window.watchContentChange[i].callback.apply(window.watchContentChange[i].element);
                window.watchContentChange[i].element.data("lastContents", window.watchContentChange[i].element.html());
            }
            ;
        }
    }
}, 500);



function showChange() {
    var element = $(this);
    profile_permits();
}

$('body').contentChange(showChange);