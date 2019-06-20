<?php

class JSON {

    /**
     * 
     * @param Boolean $error Error de la consulta
     * @param Int $code Código de respuesta http
     * @param String $message Mensaje que detalla la consulta
     * @param Array $data Datos obtenidos de la consulta
     * @return String 
     */
    public static function response($error = FALSE, $code = 200, $message = '', $data = [], $die = true) {
        $response          = new stdClass;
        $response->message = $message;
        $response->error   = $error;
        $response->code    = (!is_numeric($code)) ? 500 : $code;

        foreach ($data as $key => $value) {
            $response->{$key} = $value;
        }

        header('Content-type: application/json; charset=UTF-8');
        http_response_code($response->code);

        echo json_encode($response, JSON_UNESCAPED_UNICODE);

        if ($die)
            Yii::app()->end();
    }

}
