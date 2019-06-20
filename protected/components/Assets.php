<?php

/**
 * Assets es la clase creada para realizar la carga del archivo config.js de los módulos
 * 
 * La clase realiza la búsqueda del archivo de configuración para la carga de librerias
 * JS y CSS creada dentro de un módulo en específico, ubicada dentro de assets.
 *
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Components
 */
class Assets {

    /**
     * @const Nombre de la carpeta que almacena todas las librerías JS
     */
    const DIR = "resource";

    /**
     * @const Nombre de la carpeta donde se almacena los archivos de un
     * módulo en específico
     */
    const DIR_MODULE = "packages";

    /**
     * @const Nombre del archivo de configuración del módulo
     */
    const FILE_MODULE_CONFIG = "config.min.js";

    /**
     * Nombre del módulo
     * @var type string
     */
    public static $module;

    /**
     * Obtener el nombre del módulo
     * @return type string
     */
    public static function getModule() {
        return self::$module;
    }

    /**
     * Setear el nombre del módulo
     * 
     * @param type $module Nombre del Módulo
     */
    public static function setModule($module) {
        self::$module = $module;
    }

    /**
     * Configuración del módulo que se ejecutará
     */
    public static function configModule() {
        $basePath   = Yii::getPathOfAlias("webroot");
        $baseUrl    = Yii::app()->baseUrl;
        $pathScript = $basePath . "/" . self::DIR;
        $urlScript  = $baseUrl . "/" . self::DIR;

        if (is_dir($pathScript)) {
            self::createModuleScriptConfig($pathScript, $urlScript);
        }
    }

    /**
     * Crear el archivo de configuración que contine la lógica de carga de las
     * librerias JS y CSS del módulo
     * 
     * @param type $pathScript Url absoluta del archivo de configuración
     * @param type $urlScript Url relativa del archivo de configuración
     */
    public static function createModuleScriptConfig($pathScript, $urlScript) {

        $pathModule = $pathScript . "/" . self::DIR_MODULE . "/" . self::getModule();
        $urlModule  = $urlScript . "/" . self::DIR_MODULE . "/" . self::getModule();
        if (is_dir($pathModule)) {
            if (is_file($pathModule . "/" . self::FILE_MODULE_CONFIG)) {
                echo '<script type="text/javascript" src="' . $urlModule . '/' . self::FILE_MODULE_CONFIG . '"></script>';
            }
        }
    }

}
