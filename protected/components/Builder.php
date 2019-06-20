<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Builder extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/app';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $ID_APP;
    public $cookie_accion = 'PADAC'.Constante::PROYECTO_SIGLAS;

//    public function beforeAction($action) {
//        if (!Yii::app()->request->isAjaxRequest) {
//            if ($action->id != "access") {
//                if (isset(Yii::app()->request->cookies[$this->cookie_accion])) {
//                    unset(Yii::app()->request->cookies[$this->cookie_accion]);
//                }
//                Yii::app()->request->cookies[$this->cookie_accion] = new CHttpCookie($this->cookie_accion, TripleDes::Encrypt($action->id));
//            } else {
//                
//            }
//        }
//
//        if ($this->module->id != "sistema" and $this->id != "error") {
//            Yii::app()->padlock->validarAccesoAplicacion();
//            if ($this->module->id != "cuenta") {
//                if (!Yii::app()->padlock->validadAccesoUsuario())
//                    $this->redirect(["/login"]);
//            }
//        }
//        return parent::beforeAction($action);
//    }

//    public function actionAccess() {
//        $accion = "";
//        if (isset(Yii::app()->request->cookies[$this->cookie_accion])) {
//            $accion = TripleDes::Decrypt(Yii::app()->request->cookies[$this->cookie_accion]->value);
//        }
//        $id_usuario = Yii::app()->user->id;
//        $aplicacion = PROFILES::GetApp();
//        $modulo = Yii::app()->controller->module->id;
//        $controlador = Yii::app()->controller->id;
//        $ruta = $modulo . "/" . $controlador;
//        if ($accion != "index" && $accion != "") {
//            $ruta .= "/" . $accion;
//        }
//        $acciones = PROFILES::GetAcciones($id_usuario, $aplicacion["ID_APLICACION"], $ruta);
//        if ($accion) {
//            echo json_encode(["STATE" => true, "ACCIONES" => $acciones]);
//        } else {
//            echo json_encode(["STATE" => false, "ACCIONES" => $acciones]);
//        }
//    }

}