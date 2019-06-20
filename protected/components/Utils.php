<?php

/**
 * Utils es la clase creada para colocar funciones reutilizables
 * 
 * Vease a esta clase como un Helper o Utilitarios que permite concentrar
 * todas las funciones que son de uso cotidiano y utilizado por todos.
 *
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Components
 */
class Utils {

    public static function host($url = "", $baseUrl = false) {
        if ($baseUrl) {
            return Yii::app()->request->hostInfo . Yii::app()->baseUrl . $url;
        }
        return Yii::app()->request->hostInfo . $url;
    }

    public static function show($data, $detenerProcesos = false, $titulo = 'Datos') {
        echo "<code class='code'><b>{$titulo} :</b></code>";
        echo "<pre>";
        print_r($data);
        echo '</pre>';
        if ($detenerProcesos) {
            die();
        }
    }

    public static function agregarComidines($palabra) {
        $palabra = addcslashes(trim($palabra), '%_');
        $palabra = str_replace(' ', '%', "%{$palabra}%");
        return $palabra;
    }

    public static function systemFlash($type, $msg, $title = "Alerta!") {
        yii::app()->user->setFlash("system", [
            "type" => $type,
            "title" => $title,
            "msg" => $msg
        ]);
    }

    public static function _get($nombreGet) {
        if (!isset($_GET[$nombreGet])) {
            return null;
        }
        return $_GET[$nombreGet];
    }

    public static function generateToken($value) {
        return sha1(hash_hmac("sha1", $value, Constante::SECRET, true));
    }

    public static function existeCarpeta($urlServer) {
        if (!is_dir($urlServer)) {
            mkdir($urlServer, 0777, true);
            if (is_dir($urlServer)) {
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

}
