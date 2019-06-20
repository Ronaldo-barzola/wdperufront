<?php

/*
 * @package APP\Components
 */

class Params {

    /**
     * URL de la ubicacion de la carpeta usuarios
     * @var string
     */
    const DIR = 'storage/';

    /**
     * ID del usuario.
     * @var integer
     */
    private static $id = 0;

    /**
     * retorna el id_user
     * @return integer
     */
    public static function getId() {
        return self::$id;
    }

    /**
     * setea el id_user de la clase, para su manejo.
     * @param integer $id_user
     */
    public static function setId($id) {
        self::$id = $id;
    }

    /**
     * Obtiene la url del archivo /config/params.php dependiendo del modulo que se halla enviado. 
     * Si se envia usuario como true, se obtiene el param usuario, y se obtiene el modulo dentro del arreglo usuarios
     * retorna la url (fisica o web) de la carpeta del modulo que se esta ejecutando.
     * @param string $url
     * @param string $module
     * @param boolean $user
     * @return string
     */
    private static function setParams($url, $module, $submodule = false) {
        $params = Yii::app()->params[$module];
        
        if ($module != '' && $submodule) {
            if (isset($params[$submodule])) {
                $params = self::getUrlSubmodule($module, $params[$submodule]);
            }
        }

        $link = $url . $params;

        return $link;
    }

    /*
     * Function web
     * Params:  $module = recibe el nombre del modulo que se esta ejecutando
     *          $user = true o false, dependiendo si es una carpeta dentro de FILES/usuarios
     * Descripcion: Utilizando la funcion setParams, genera la url web del modulo que se esta ejecutando.
     * Retorna la url web del modulo en ejecucion.
     */

    public static function web($module = false, $submodule = false) {
        $url = yii::app()->request->hostInfo . yii::app()->homeUrl;
        return self::setParams($url, $module, $submodule);
    }

    /**
     * Descripcion: Utilizando la funcion recursiva setParams, genera la url fisica del modulo que se esta ejecutando.
     * Retorna la url fisica del modulo en ejecucion.
     * @param string $module recibe el nombre del modulo que se esta ejecutando
     * @param boolean $user true o false, dependiendo si es una carpeta dentro de FILES/usuarios
     * @return type
     */
    public static function server($module = '', $submodule = false) {
        $url = yii::getPathOfAlias("webroot") . '/';
        return self::setParams($url, $module, $submodule);
    }

    /**
     * 
     * @param string $module Nombre del modulo del param.
     * @param array $parametros llaves a ser reemplazadas en el param (:id)
     * @param boolean/int $user para indicar si el param pertenece a usuario (se da el id_user para setearlo) o si es externo (FALSE).
     * @param string $tipo recibe web o server dependiendo de la url que se requiera.
     * @return string
     */
    public static function urlFile($id = false, $module, $submodule = false, $parametros = [], $tipo = "web") {
        if ($id != false) {
            self::setId($id);
        }
        $path = self::web($module, $submodule);

        if ($tipo === "server") {
            $path = self::server($module, $submodule);
        }

        foreach ($parametros as $idParametro => $parametro) {
            $path = str_replace($idParametro, $parametro, $path);
        }

        return $path;
    }

    /**
     * Retorna la url de FILES de usuarios incluido el id del usuario, validando la existencia de la carpeta.
     * @return string
     */
    private static function getUrlSubmodule($module, $submodule) {
        return self::DIR . $module . "/" . self::getId() . "/" . $submodule;
    }

}
