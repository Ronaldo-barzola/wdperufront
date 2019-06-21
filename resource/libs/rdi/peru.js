$(function () {
    var urlController = Request.BaseUrl + '/' + Request.UrlHash.m + '/principal/view/region/';
    $(".mapcontainer").mapael({
        map: {
            name: "peru",
            defaultArea: {
                attrs: {
                    stroke: "#fff",
                    "stroke-width": 1
                },
                attrsHover: {
                    fill: "#35322e",
                    "stroke-width": 2
                }
            }
        },
        legend: {
            area: {
                title: "Population of France by department",
                slices: [
                    {
                        max: 300000,
                        attrs: {
                            fill: "#B8C3C8"
                        },
                        label: "Less than de 300 000 inhabitants"
                    },
                    {
                        min: 300000,
                        max: 500000,
                        attrs: {
                            fill: "#B8C3C8"
                        },
                        label: "Between 100 000 and 500 000 inhabitants"
                    },
                    {
                        min: 500000,
                        max: 1000000,
                        attrs: {
                            fill: "#B8C3C8"
                        },
                        label: "Between 500 000 and 1 000 000 inhabitants"
                    },
                    {
                        min: 1000000,
                        attrs: {
                            fill: "#B8C3C8"
                        },
                        label: "More than 1 million inhabitants"
                    }
                ]
            }
        },
        areas: {
            "tacna": {
                value: "2617939",
                href: urlController + "tacna",
                tooltip: {content: "<center><img width='80' height='80' src='resource/libs/rdi/img/tacna.jpg' ><br><span style=\"font-weight:bold;\">Tacna </span></center><br />Clima/Ubicación :18.05°S 70.27°W"},
                text: {content: "Tacna", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "moquegua": {
                value: "2268265",
                href: urlController + "moquegua",
                tooltip: {content: "<span style=\"font-weight:bold;\">Moquegua</span><br />Clima/Ubicación :18.05°S 70.27°W"},
                text: {content: "Moquegua", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "puno": {
                value: "2000550",
                href: urlController + "puno",
                tooltip: {content: "<span style=\"font-weight:bold;\">Puno</span><br />Clima/Ubicación :18.05°S 70.27°W"},
                text: {content: "Puno", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "arequipa": {
                value: "1756069",
                href: urlController + "puno",
                tooltip: {content: "<span style=\"font-weight:bold;\">Arequipa</span><br />Clima/Ubicación :18.05°S 70.27°W"},
                text: {content: "Arequipa", attrs: {"font-size": 10, fill: "#004a9b"}}

            },
            "ayacucho": {
                value: "1590749",
                href: urlController + "ayacucho",
                tooltip: {content: "<span style=\"font-weight:bold;\">Ayacucho</span><br />Clima/Ubicación :18.05°S 70.27°W"},
                text: {content: "Ayacucho", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "ica": {
                value: "1534895",
                href: urlController + "ica",
                tooltip: {content: "<span style=\"font-weight:bold;\">Ica</span><br />Clima/Ubicación :18.05°S 70.27°W"},
                text: {content: "Ica", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "cusco": {
                value: "1489209",
                href: urlController + "cusco",
                tooltip: {content: "<span style=\"font-weight:bold;\">Cusco</span><br />Clima :18.05°"},
                text: {content: "Cusco", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "apurimac": {
                value: "1479277",
                href: urlController + "apurimac",
                tooltip: {content: "<span style=\"font-weight:bold;\">Apurímac</span><br />Clima/Ubicación :18.05°S 70.27°W"},
                text: {content: "Apurimac", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "huancavelica": {
                value: "1435448",
                href: urlController + "huancavelica",
                tooltip: {content: "<span style=\"font-weight:bold;\">Huancavelica</span><br />Clima/Ubicación :18.05°S 70.27°W"},
                text: {content: "Huancavelica", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "lima": {
                value: "1347008",
                href: urlController + "lima",
                tooltip: {content: "<span style=\"font-weight:bold;\">Lima</span><br />Clima/Ubicación :18.05°S 70.27°W"},
                text: {content: "Lima", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "junin": {
                value: "1340868",
                href: urlController + "junin",
                tooltip: {content: "<span style=\"font-weight:bold;\">Junín</span><br />Clima/Ubicación :18.05°S 70.27°W"},
                text: {content: "Junin", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "ucayali": {
                value: "1317685",
                href: urlController + "ucayali",
                tooltip: {content: "<span style=\"font-weight:bold;\">Ucayali</span><br />Population : 1317685"},
                text: {content: "Ucayali", attrs: {"font-size": 10, fill: "#0 04a9b"}}
            },
            "pasco": {
                value: "1275952",
                href: urlController + "pasco",
                tooltip: {content: "<span style=\"font-weight:bold;\">Pasco</span><br />Population : 1275952"},
                text: {content: "Pasco", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "ancash": {
                value: "1268370",
                href: urlController + "ancash",
                tooltip: {content: "<span style=\"font-weight:bold;\">Ancash</span><br />Population : 1268370"},
                text: {content: "Ancash", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "huanuco": {
                value: "1233759",
                href: urlController + "huanuco",
                tooltip: {content: "<span style=\"font-weight:bold;\">Huanuco</span><br />Population : 1233759"},
                text: {content: "Huanuco", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "la_ĺibertad": {
                value: "1233645",
                href: urlController + "la_libertad",
                tooltip: {content: "<span style=\"font-weight:bold;\">La Libertad</span><br />Population : 1233645"},
                text: {content: "La Libertad", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "loreto": {
                value: "1187836",
                href: urlController + "loreto",
                tooltip: {content: "<span style=\"font-weight:bold;\">Loreto</span><br />Population : 1187836"},
                text: {content: "Loreto", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "cajamarca": {
                value: "50000",
                href: urlController + "cajamarca",
                tooltip: {content: "<span style=\"font-weight:bold;\">Cajamarca</span><br />Population : 50000"},
                text: {content: "Cajamarca", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "lambayeque": {
                value: "1094579",
                href: urlController + "lambayeque",
                tooltip: {content: "<span style=\"font-weight:bold;\">Lambayeque</span><br />Population : 1094579"},
                text: {content: "Lambayeque", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "amazonas": {
                value: "1066667",
                href: urlController + "amazonas",
                tooltip: {content: "<span style=\"font-weight:bold;\">Amazonas</span><br />Population : 1066667"},
                text: {content: "Amazonas", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "piura": {
                value: "1062617",
                href: urlController + "piura",
                tooltip: {content: "<span style=\"font-weight:bold;\">Piura</span><br />Population : 1062617"},
                text: {content: "Piura", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "tumbes": {
                value: "1026222",
                href: urlController + "tumbes",
                tooltip: {content: "<span style=\"font-weight:bold;\">Tumbes</span><br />Population : 1026222"},
                text: {content: "Tumbes", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "san_martin": {
                value: "1015470",
                href: urlController + "san_martin",
                tooltip: {content: "<span style=\"font-weight:bold;\">San Martin</span><br />Population : 1015470"},
                text: {content: "San Martin", attrs: {"font-size": 10, fill: "#004a9b"}}
            },
            "madre_de_dios": {
                value: "929286",
                href: urlController + "madre_de_dios",
                tooltip: {content: "<span style=\"font-weight:bold;\">Madre de Dios</span><br />Population : 929286"},
                text: {content: "Madre de Dios", attrs: {"font-size": 10, fill: "#004a9b"}}
            }
        }
    });

//                slider = noUiSlider.create($(".slider")[0], {
//                    start: [0, 3000000],
//                    step: 100000,
//                    connect: true,
//                    orientation: 'horizontal',
//                    range: {
//                        'min': 0,
//                        'max': 3000000
//                    },
//                    pips: {
//                        mode: 'range',
//                        density: 2
//                    }
//                });

//                slider.on('set', function (values) {
//                    var opt = {
//                        animDuration: 500,
//                        hiddenOpacity: 0.1,
//                        ranges: {
//                            area: {
//                                min: parseInt(values[0]),
//                                max: parseInt(values[1])
//                            }
//                        }
//                    };
//                    $(".mapcontainer").trigger("showElementsInRange", [opt]);
//                    $(".values").text("Show area with a population between " + parseInt(values[0]) + " and " + parseInt(values[1]) + " inhabitants");
//                });

//                $(slider).trigger("set");

});
