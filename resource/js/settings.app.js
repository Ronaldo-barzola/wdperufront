/* 
 * Contiene la variable global que manejara el proyecto
 * donde se colocarán valores por defecto para ser utilizado
 * por todos los programadores en todos los módulos.
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 */

/**
 * @type object 
 */
var app = {
    requireConfig: {
        baseUrl: Request.BaseUrl + '/resource',
        deps: ['frontend', 'system'],
        paths: {
            "underscore": "libs/underscore-min",
            "jquery": "libs/jquery/jquery-1.11.1.min",
            "modernizr": "libs/modernizr.custom",
            "ui": "libs/jquery-ui/jquery-ui.min",
            "bootstrap": "libs/bootstrapv3/js/bootstrap.min",
            "scrollbar": "libs/jquery-scrollbar/jquery.scrollbar.min",
            "cookie": "libs/jquery-cookie/src/jquery.cookie",
            "bootbox": 'libs/bootbox/bootbox.min',
            "frontend": Request.themeUrl + "/js/pages.min",
//            "pace": "libs/pace-master/pace",
            "system": "js/system.min",
            //extras
            "select2": "libs/select2/js/select2.full.min",
            "validate": 'libs/jquery-validation/js/jquery.validate.min',
            "croppie": 'libs/Croppie/croppie.min',
            "moment": "libs/moment/moment.min",
            "datepicker": 'libs/bootstrap-datepicker/js/bootstrap-datepicker',
            "datepicker-es": 'libs/bootstrap-datepicker/js/locales/bootstrap-datepicker.es',
            "daterangepicker": 'libs/bootstrap-daterangepicker/daterangepicker',
            "bT": 'libs/bootstrap-table/bootstrap-table.min',
            "bT_ES": "libs/bootstrap-table/locale/bootstrap-table-es-SP.min",
            "bootstrapTable": "libs/bootstrap-table/extensions/export/bootstrap-table-export.min",
            "jq_export": "libs/tableExport.jquery.plugin/tableExport.min",
            "canvasjs": "libs/canvasjs/canvasjs.min",
            "CorePdfmake": 'libs/pdfmake/build/pdfmake.min',
            "pdfmake": 'libs/pdfmake/build/vfs_fonts',
            "jqueryUI": 'libs/jQueryUI/jquery-ui.min',
            'highcharts': 'libs/highcharts/highcharts.min',
            'exportings': 'libs/highcharts/modules/exporting',
            'data': 'libs/highcharts/modules/data',
            'drilldown': 'libs/highcharts/modules/drilldown',
//            "bootstrap_wizar": 'libs/boostrap-form-wizard/jquery.bootstrap.wizard.min',
//            "wizard": 'libs/boostrap-form-wizard/form_wizard'
        },
        shim: {
            "underscore": {
                exports: ["_"]
            },
            "jquery": {
                deps: ['underscore'],
                exports: ["$"]
            },
            "modernizr": {
                deps: ['jquery']
            },
            "ui": {
                deps: ['modernizr']
            },
            "bootstrap": {
                deps: ['ui']
            },
            "scrollbar": {
                deps: ['bootstrap']
            },
//            "pace": {
//                deps: ['bootstrap']
//            },
            "cookie": {
                deps: ['scrollbar']
            },
            "bootbox": {
                deps: ['cookie']
            },
            "frontend": {
                deps: ['bootbox']
            },
            "system": {
                deps: ['frontend']
            },
            "select2": {
                deps: ['jquery']
            },
            "validate": {
                deps: ['jquery']
            },
            "croppie": {
                deps: ['jquery']
            },
            "datepicker": {
                deps: ['bootstrap']
            },
            "datepicker-es": {
                deps: ['datepicker']
            },
            "moment": {
                deps: ['jquery']
            },
            "daterangepicker": {
                deps: ['datepicker-es', 'moment']
            },
            "bT": {
                deps: ["bootstrap"]
            },
            "bT_ES": {
                deps: ["bT"]
            },
            "bootstrapTable": {
                deps: ["bT_ES"]
            },
            "jq_export": {
                deps: ["bootstrapTable"]
            },
            "canvasjs": {
                deps: ["jquery"]
            },
//            "bootstrap_wizar": {
//                deps: ["jquery"]
//            },
//            "wizard": {
//                deps: ["bootstrap_wizar"]
//            },
            CorePdfmake: {
                deps: ['jquery']
            },
            pdfmake: {
                deps: ['CorePdfmake']
            },
            jqueryUI: {
                deps: ['jquery']
            },
            highcharts: {
                deps: ['jquery']
            },
            exportings: {
                deps: ['highcharts']
            },
            data: {
                deps: ['highcharts']
            },
            drilldown: {
                deps: ['highcharts']
            },
        }
    }
};