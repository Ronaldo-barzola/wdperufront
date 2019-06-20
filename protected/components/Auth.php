<?php

/**
 * Auth es la clase creada para controlar los accesos al sistema
 * 
 * Está clase filtra el acceso mediante permisos o roles especificos
 * configurados de manera general y obteniendo los permisos únicos de
 * un módulo en especifico.
 *
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Components
 */
class Auth extends Builder {

    public function filters() {
        return array('accessControl');
    }

    public function accessRules() {
        return $this->accesosModulo();
    }

    public function accesosModulo() {
        if (isset($this->module)) {
            $urlConfigModule = "application.modules.{$this->module->id}.config";
            $pathConfigModule = Yii::getPathOfAlias($urlConfigModule);
            $RulesModule = [];
            if (is_dir($pathConfigModule)) {
                $fileRules = $pathConfigModule . DIRECTORY_SEPARATOR . 'Rules.php';
                if (is_file($fileRules)) {
                    Yii::import($urlConfigModule . ".Rules");
                    foreach (Rules::$Auth as $rule) {
                        $RulesModule[] = $rule;
                    }
                    foreach ($this->accesoSistema() as $roleSistema) {
                        $RulesModule[] = $roleSistema;
                    }
                    return $RulesModule;
                }
            }
        }
        return $this->accesoSistema();
    }

    public function accesoSistema() {
        return [
            ['allow',
                'users' => ['@'],
            ],
            ['allow',
                'controllers' => ['sistema/error', 'cuenta/login','map/principal','map/service'],
                'users' => ['*'],
            ],
            ['deny',
                'users' => ['@'],
            ],
        ];
    }

}
