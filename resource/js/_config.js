var MPC = MPC || {};

MPC.config = {
    baseUrl: (Request.Host + Request.BaseUrl),
    moduleUrl: (Request.Host + Request.BaseUrl + "/" + Request.UrlHash.m + "/"),
    bootstrapTable: {
        escape: false,
        locale: 'es-SP',
        search: true,
        pagination: true,
        pageSize: 10,
        idField: "id"
    },
    datepicker: {
        language: "es",
        weekStart: 1,
        format: "yyyy-mm-dd"
    },
    bootbox: {
        template: {
            slide_up: "<div class='bootbox modal' tabindex='-1' role='dialog' aria-hidden='true'>" +
                    "<div class='modal-dialog'>" +
                    "<div class='modal-content-wrapper'>" +
                    "<div class='modal-content'>" +
                    "<div class='modal-body'><div class='bootbox-body'></div></div>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "</div>"
        }
    }
};