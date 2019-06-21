<?php

class PrincipalController extends Auth {

    public $layout = '//layouts/publico';

    public function actionIndex() {
        $this->render('index');
    }

    public function actionStatusReserv($id, $token) {
        $dataReserva = QReserva::fyndReservaById($id);
        if (Utils::generateToken($id) != $token) {
            throw new Exception("El metodo no esta permitido", 403);
        } else {
            $this->render("_statusReserv", ["dataReserva" => $dataReserva]);
        }
    }

    public function actionView($region) {
        if ($region) {
            $this->render("service", [
                "region" => $region
            ]);
        } else {
            throw new Exception("El metodo no esta permitido", 403);
        }
    }

    public function actionReservHotel() {
        $id_hotel = $_REQUEST["id_hotel"];
        $layer = $this->renderPartial("_reserva", ["id_hotel" => $id_hotel], true);
        echo json_encode(["layer" => $layer]);
    }

    public function actionCartaRestaurante() {
        $id_restaurante = $_REQUEST["id_restaurante"];
        $layer = $this->renderPartial("_restaurante", ["id_restaurante" => $id_restaurante], true);
        echo json_encode(["layer" => $layer]);
    }

//    public static function actionSearchExpedienteByNumber() {
//        $url = 'http://localhost:8081/api/clientes';
////        $url = 'http://172.17.1.18:8090/apiDef/municallao//desarrolloe/expediente/' . $n_expediente . '/anio/' . $anio_expediente;
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
//        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $data = curl_exec($ch);
//        $response = json_decode($data, true);
//        curl_close($ch);
//        $html = "";
//        foreach ($response as $res) {
//            $html .= "<label>Id: " . $res['id'] . "</label>";
//        }
//        print_r($response[0]["nombre"]);
//        return $html;
//    }

    public function actionSaveReserva() {

        $transaction = Yii::app()->db->beginTransaction();
        $reserva = new MODELRESERVAHOTEL;
        $reserva->TIPO_DOCUMENTO_PERSONA = $_POST["TIPO_DOCUMENTO_PERSONA"];
        $reserva->NUMERO_DOCUMENTO_PERSONA = $_POST["NUMERO_DOCUMENTO_PERSONA"];
        $reserva->APELLIDO_PATERNO_PERSONA = $_POST["APELLIDO_PATERNO_PERSONA"];
        $reserva->APELLIDO_MATERNO_PERSONA = $_POST["APELLIDO_MATERNO_PERSONA"];
        $reserva->NOMBRES_PERSONA = $_POST["NOMBRES_PERSONA"];
        $reserva->TIPO_HABITACION = $_POST["TIPO_HABITACION"];
        $reserva->ID_HOTEL = $_POST["ID_HOTEL"];
        $reserva->FECHA_RESERVA = Fecha::format($_POST["FECHA_RESERVA"], 'Ymd');
        $reserva->FECHA_REGISTRO = Fecha::format(date("d/m/Y"), 'Ymd');
        $reserva->ESTADO_RESERVA = Constante::ACTIVO;

//        try {
        if (!$reserva->save()) {
            Utils::show($reserva->errors);
            throw new Exception("No se pudo registrar la reserva");
//            }
//        } catch (Exception $ex) {
//            JSON::response(TRUE, $ex->getCode(), $ex->getMessage(), []);
//        }
        }
        $transaction->commit();
        echo json_encode(['status' => true, "IDRESERVA" => $reserva->ID_RESERVA]);
    }

    public function actionPrint() {
//        $idReserva = 3;
        $idReserva = $_REQUEST["id_reserva"];
//        $url = "http://app.municallao.gob.pe/wdperu/carnet/carnet/StatusReserv/id/{$idReserva}/tkn/" . Utils::generateToken($idReserva);
//        $url = "http://172.17.1.81/upc/wdperu/map/principal/StatusReserv/id/{$idReserva}/token/" . Utils::generateToken($idReserva);
        $url = "http://app.municallao.gob.pe/wdperu/map/principal/StatusReserv/id/{$idReserva}/token/" . Utils::generateToken($idReserva);
        $api = "https://chart.googleapis.com/chart?cht=qr&chl={$url}&chs=150x150&chld=L|0";
        $codigo_qr = base64_encode(file_get_contents("https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={$url}"));
        $dataReserva = QReserva::fyndReservaById($idReserva);
        $content = [
            [
                [
                    "text" => $idReserva . " " . Utils::generateToken($idReserva)
                ],
                [
                    "text" => "CONSTANCIA DE RESERVA\n\n",
                    "alignment" => "center",
                    "bold" => true
                ],
                [
                    "table" => [
                        "body" => [
                            [
                                [
                                    "border" => [false, true, false, false],
                                    "fillColor" => '#eeeeee',
                                    "text" => 'Código de Verificación',
                                    "alignment" => "center",
                                    "bold" => true
                                ],
                                [
                                    "border" => [false, false, false, false],
                                    "fillColor" => '#dddddd',
                                    "text" => 'HOTEL : ',
                                    "alignment" => "center",
                                    "bold" => true
                                ],
                                [
                                    "border" => [true, true, true, true],
                                    "fillColor" => '#eeeeee',
                                    "text" => $dataReserva["nombre_hotel"],
                                    "alignment" => "center"
                                ]
                            ],
                            [
                                [
                                    "rowSpan" => 4,
                                    "border" => [true, true, true, true],
                                    "image" => 'data:image/jpeg;base64,' . $codigo_qr,
                                    "width" => 150
                                ],
                                [
                                    "border" => "undefined",
                                    "fillColor" => '#dddddd',
                                    "text" => 'FECHA DE EMISIÓN :',
                                    "alignment" => "center",
                                    "bold" => true
                                ],
                                [
                                    "border" => [true, false, false, false],
                                    "fillColor" => '#eeeeee',
//                                    "text" => $d'07/06/2019',
                                    "text" => Fecha::format($dataReserva["FECHA_REGISTRO"], "d-m-Y"),
                                    "alignment" => "center"
                                ]
                            ],
                            [
                                '',
                                [
                                    "border" => [false, false, false, false],
                                    "fillColor" => '#dddddd',
                                    "text" => 'FECHA DE RESERVA : ',
                                    "alignment" => "center",
                                    "bold" => true
                                ],
                                [
                                    "border" => [true, true, true, true],
                                    "fillColor" => '#eeeeee',
                                    "text" => Fecha::format($dataReserva["FECHA_RESERVA"], "d-m-Y"),
                                    "alignment" => "center"
                                ]
                            ],
                            [
                                "",
                                [
                                    "border" => [false, false, false, false],
                                    "fillColor" => '#dddddd',
                                    "text" => 'APELLIDOS Y NOMBRES : ',
                                    "alignment" => "center",
                                    "bold" => true
                                ],
                                [
                                    "border" => [true, true, true, true],
                                    "fillColor" => '#eeeeee',
                                    "text" => $dataReserva["NOMBRES_PERSONA"] . " " . $dataReserva["APELLIDO_PATERNO_PERSONA"] . " " . $dataReserva["APELLIDO_MATERNO_PERSONA"],
                                    "alignment" => "center"
                                ]
                            ],
                            [
                                "",
                                [
                                    "border" => [false, false, false, false],
                                    "fillColor" => '#dddddd',
                                    "text" => 'N° DE DOCUMENTO : ',
                                    "alignment" => "center",
                                    "bold" => true
                                ],
                                [
                                    "border" => [true, true, true, true],
                                    "fillColor" => '#eeeeee',
                                    "text" => $dataReserva["NUMERO_DOCUMENTO_PERSONA"],
                                    "alignment" => "center"
                                ]
                            ],
                            [
                                [
                                    "text" => 'Importante :',
                                    "alignment" => "center",
                                    "bold" => true
                                ],
                                [
                                    "colSpan" => 2,
                                    "border" => [true, true, true, true],
                                    "fillColor" => '#eeffee',
                                    "text" => 'Se recomienda estar a la fecha indicada de la reserva con el respectivo código de verificación de lo contrario no se podrá verificar la reserva',
                                    "alignment" => "justify"
                                ],
                                ''
                            ],
                        ]
                    ],
                    "layout" => [
                        "defaultBorder" => false,
                    ]
                ],
            ],
        ];

        echo json_encode(['estado' => true, 'content' => $content]);
    }

}
