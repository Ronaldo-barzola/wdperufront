/**
 * Configuración personalizada para la carga de librerias del módulo
 * 
 * @type Object
 */
var Builder = {
    module: {
        controllers: {
            principal: {
                actions: {
                    view: {
                        js: ["service"],
                        css: {
                            libs: [],
                            package: [],
                            custom: []
                        }
                    },
                    statusreserv: {
                        js: ["loadqr"],
                        css: {
                            libs: [],
                            package: [],
                            custom: []
                        }
                    }
                },
                //Assets para un controllador especifico y todas sus acciones
                js: [],
                css: {
                    libs: [],
                    package: [],
                    custom: []
                }
            }
        },
        //Assets para todo el módulo, todos sus controlladores y todas sus acciones
        js: ["_PATH_:pdfmake"],
        css: {
            libs: [],
            package: [],
            custom: []
        }
    }
};
