<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class PROFILES {

    public static function GenerateMenu() {
        $html = "";
        $id_user = Yii::app()->user->id;
        $app = PROFILES::GetApp();
        $BASES = PROFILES::GetAccess($id_user, $app["ID_APLICACION"], 0);
        foreach ($BASES as $BASE) {
            $html .= PROFILES::Build($BASE);
        }
        return $html;
    }

    public static function GetApp() {
        $app_key = Yii::app()->padlock->llave;
        $app_secret = Yii::app()->padlock->secreto;
        $sql = "SELECT * FROM APLICACIONES A WHERE LLAVE_APLICACION = '{$app_key}' AND SECRETO_APLICACION = '{$app_secret}'";
        $command = Yii::app()->pl->createCommand($sql);
        return $command->queryRow();
    }

    public static function GetAccess($user, $app, $acceso_padre) {
        $sql = "EXEC SP_OBTENER_ACCCESOS_USUARIO {$app}, {$user}, {$acceso_padre}";
        $command = Yii::app()->pl->createCommand($sql);
        return $command->queryAll();
    }

    public static function GetAcciones($usuario, $aplicacion, $ruta) {
        $sql = "EXEC SP_OBTENER_ACCIONES_BLOQUEADAS_USUARIO {$usuario}, {$aplicacion}, '{$ruta}'";
        $command = Yii::app()->pl->createCommand($sql);
        return $command->queryAll();
    }

    public static function Build($access) {
        $icon = ($access["MENU_ICONO"] == "") ? "" : "<i class='fs-16 fa fa-" . $access["MENU_ICONO"] . "'></i> ";
        $url = ($access["DESPLEGABLE"]) ? "#" : Yii::app()->createUrl($access["RUTA"]);
        $html = "<li>" /////ABRIR MENU ITEM
                . "<a href='" . $url . "' style='width: 90%'>" ////////PONER RUTA HREF
                . $icon ////////ICONO  MENU
                . $access["MENU_NOMBRE"] ///////////NOMBRE MENU .
                . (($access["DESPLEGABLE"]) ? "<span class='arrow'></span>" : "") /////FLECHA_DESPLEGABLE
                . "</a>"; /////CERRAR REF
        if ($access["DESPLEGABLE"]) {
            $id_user = Yii::app()->user->id;
            $app = PROFILES::GetApp();
            $html.= "<ul class='sub-menu'> "; /////////ABRIR SUBMENU ITEM
            $BASES = PROFILES::GetAccess($id_user, $app["ID_APLICACION"], $access["ID_ACCESO"]);
            foreach ($BASES as $BASE) {
                $html .= PROFILES::Build($BASE);
            }
            $html.= "</ul> "; /////////CERRAR SUBMENU ITEM
        }
        $html .= "</li>"; ////////////CERRAR MENU ITEM
        return $html;
    }

    public static function FindUser($id) {
        $sql = "SELECT * FROM USUARIOS U INNER JOIN BDMASTER.dbo.PERSONAS M ON U.ID_PERSONA = M.ID_PERSONA WHERE ID_USUARIO = {$id}";
        $command = Yii::app()->pl->createCommand($sql);
        return $command->queryRow();
    }

    public static function GenerateAppMenu() {
        $html = "";
        $id_user = Yii::app()->user->id;
        $ACCESS = PROFILES::UserAccess($id_user);
        include('Net/SFTP.php');
        $sftp = new Net_SFTP('172.17.1.20');
        $conexion = false;
        if ($sftp->login(Yii::app()->sftp->username, Yii::app()->sftp->password)) {
            $conexion = true;
        }
        $i = 0;
        $count = count($ACCESS);
        foreach ($ACCESS as $column) {
            $i++;
            $APP = PROFILES::FindApp($column["ID_APLICACION"]);
            if ($APP) {
                $html .= PROFILES::BuildAppMenu($APP, $sftp, $conexion, $i, $count);
            }
        }
        return $html;
    }

    public static function UserAccess($id) {
        $sql = "SELECT * FROM USUARIOS_ACCESOS WHERE ID_USUARIO = {$id} AND ESTADO_USUARIO_ACCESO = 1";
        $command = Yii::app()->pl->createCommand($sql);
        return $command->queryAll();
    }

    public static function FindApp($id) {
        $sql = "SELECT * FROM APLICACIONES WHERE ID_APLICACION = {$id}";
        $command = Yii::app()->pl->createCommand($sql);
        return $command->queryRow();
    }

    public static function BuildAppMenu($app, $sftp, $conexion, $i, $count) {
        $url = $app["URL_APLICACION"];
        if ($app["URL_IMAGEN_APLICACION"] && $conexion) {
            $srcImage = "data:image/png;base64," . base64_encode($sftp->get("RepositorioGeneral/PADLOCK/aplicaciones/" . $app["URL_IMAGEN_APLICACION"]));
        } else {
            $srcImage = "http://placehold.it/200/53CCB9?text={$app["NOMBRE_APLICACION"]}";
        }
        $html = "";
        if ($i % 2 != 0) {
            $html.= '<div class="row">';
        }
        $html .= '<div class="col-xs-6 no-padding"><a href="/' . $url . '" class="p-l-' . (($i % 2 != 0) ? "40" : "10") . '"><img style="width: 83px; height: 83px" src="' . $srcImage . '" alt="socail"></a></div>';
        if ($i % 2 == 0 || $i == $count) {
            $html.= '</div><br>';
        }
        return $html;
    }

    public static function GetRol() {
        $user = Yii::app()->user->id;
        $app = PROFILES::GetApp();
        $sql = "SELECT * FROM APLICACIONES_ROLES R INNER JOIN USUARIOS_ACCESOS SUACC ON R.ID_ROL = SUACC.ID_ROL WHERE ID_USUARIO = {$user} AND SUACC.ID_APLICACION = {$app["ID_APLICACION"]} AND ESTADO_USUARIO_ACCESO = 1";
        $command = Yii::app()->pl->createCommand($sql);
        return $command->queryRow();
    }

}
