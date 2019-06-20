<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class QAbastecimiento {

    public static function GetBienes() {
        $sql = "SELECT * FROM PATRIMONIO_BIEN ORDER BY DENOMINACION_BEIN";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    public static function GetTiposCausalBaja() {
        $sql = "SELECT ID_TIPO_CAUSAL_BAJA,DESCRIPCION=DESCRIPCION_CAUSAL_BAJA+ '- '+INDICADOR_CAUSAL_BAJA FROM PATRIMONIO_TIPO_CAUSAL_BAJAS";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_TIPO_CAUSAL_BAJA", "DESCRIPCION");
    }

    public static function GetTiposCausalAlta() {
        $sql = "SELECT ID_TIPO_CAUSAL_ALTA,DESCRIPCION=DESCRIPCION_CAUSAL_ALTA+' - '+INDICADOR_CAUSAL_ALTA FROM PATRIMONIO_TIPO_CAUSAL_ALTAS WHERE ESTADO_CAUSAL_ALTA='1'";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_TIPO_CAUSAL_ALTA", "DESCRIPCION");
    }

    public static function GetTipoUsoCuenta() {
        $sql = "SELECT ID_USO_CUENTA,DESCRIPCION=DESCRIPCION_USO_CUENTA+'-'+INDICADOR_USO_CUENTA FROM PATRIMONIO_TIPO_USO_CUENTAS";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_USO_CUENTA", "DESCRIPCION");
    }

    public static function GetTiposUsoCuenta() {
        $sql = "SELECT ID_USO_CUENTA,DESCRIPCION=DESCRIPCION_USO_CUENTA+'('+INDICADOR_USO_CUENTA+')' FROM PATRIMONIO_TIPO_USO_CUENTAS";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_USO_CUENTA", "DESCRIPCION");
    }

    public static function GetTiposCuenta() {
        $sql = "SELECT * FROM PATRIMONIO_TIPO_CUENTAS";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_CUENTA", "DESCRIPCION_CUENTA");
    }

    public static function GetEstadosBien() {
        $sql = "SELECT ID_ESTADO_BIEN,DESCRIPCION=DESCRIPCION_ESTADO_BIEN+' - '+INDICADOR_ESTADO_BIEN FROM PATRIMONIO_ESTADO_BIENES";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_ESTADO_BIEN", "DESCRIPCION");
    }

    public static function GetEntidades() {
        $sql = "SELECT ID_ENTIDAD,NOMBRE_ENTIDAD FROM PATRIMONIO_ENTIDAD";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_ENTIDAD", "NOMBRE_ENTIDAD");
    }

    public static function GetCondiciones() {
        $sql = "SELECT ID_CONDICION,DESCRIPCION=DESCRIPCION_CONDICION+' - '+INDICADOR_CONDICION  FROM PATRIMONIO_CONDICIONES";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_CONDICION", "DESCRIPCION");
    }

    public static function GetDocumentosAdquisicion() {
        $sql = "SELECT * FROM PATRIMONIO_TIPO_DOC_ADQUISICIONES";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_DOC_ADQUISICION", "DESCRIPCION_ADQUISICION");
    }

    public static function GetDocumentosIdentidad() {
        $sql = "SELECT ID_TIPO_DOC_IDENDITDAD,ABREVIATURA_TIPO_DOC_IDENTIDAD FROM PATRIMONIO_TIPO_DOC_IDENTIDADES";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    public static function getGerencias($return) {
        $sql = "SELECT G.ID_SUBGERENCIA,B.NOMBRE_GERENCIA FROM PATRIMONIO_GERENCIAS G 
                INNER JOIN BDMASTER.dbo.GERENCIAS B ON B.ID_GERENCIA=G.ID_SUBGERENCIA
                WHERE G.SW_GERENCIA_PADRE='1'
                ORDER BY B.ABREVIATURA_GERENCIA ASC";
        $command = Yii::app()->db->createCommand($sql);
        if ($return === '1') {
            return $command->queryAll();
        } else {
            return CHtml::listData($command->queryAll(), "ID_SUBGERENCIA", "NOMBRE_GERENCIA");
        }
    }

    public static function getSubGerencias($id_gerencia, $return) {
//        ($id_gerencia!='')?$text="WHERE":;
        $sql = "SELECT PG.ID_GERENCIA,G.NOMBRE_GERENCIA FROM PATRIMONIO_GERENCIAS PG INNER JOIN BDMASTER.dbo.GERENCIAS G ON G.ID_GERENCIA=PG.ID_SUBGERENCIA WHERE PG.ID_GERENCIA_PADRE=:ID_GERENCIA AND SW_GERENCIA_PADRE='0'";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":ID_GERENCIA", $id_gerencia, PDO::PARAM_STR);
        if ($return === '1') {
            return $command->queryAll();
        } else {
            return CHtml::listData($command->queryAll(), "ID_GERENCIA", "NOMBRE_GERENCIA");
        }
    }

    public static function getSubGerenciasAll() {
        $sql = "SELECT PG.ID_GERENCIA,G.NOMBRE_GERENCIA FROM PATRIMONIO_GERENCIAS PG INNER JOIN BDMASTER.dbo.GERENCIAS G ON G.ID_GERENCIA=PG.ID_SUBGERENCIA";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_GERENCIA", "NOMBRE_GERENCIA");
    }

    public static function GetResponsables() {
        $sql = "SELECT ID_RESPONSABLE,DATOS=CONCAT(P.APELLIDO_PATERNO_PERSONA,' ',P.APELLIDO_MATERNO_PERSONA,' ',P.NOMBRES_PERSONA) FROM PATRIMONIO_RESPONSABLES PR INNER JOIN BDMASTER.dbo.PERSONAS P ON P.ID_PERSONA=PR.ID_PERSONA";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_RESPONSABLE", "DATOS");
    }

    public static function getCorrelativo($denominacion) {
        $sql = "SELECT CORRELATIVO=RIGHT('0000' + Ltrim(Rtrim(ISNULL(MAX(COD_PATRIMONIAL_CORRELATIVO),0)+1)),4)"
                . " FROM PATRIMONIO_BIENES WHERE DENOMINACION_BEIN='{$denominacion}'";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryRow();
    }

    public static function getResponsableById($id_gerencia, $return) {
        $sql = "SELECT ID=PR.ID_RESPONSABLE,DATOS=P.APELLIDO_PATERNO_PERSONA+' '+P.APELLIDO_MATERNO_PERSONA+' '+P.NOMBRES_PERSONA FROM PATRIMONIO_GERENCIA_RESPONSABLES GR"
                . " INNER JOIN PATRIMONIO_RESPONSABLES PR ON PR.ID_RESPONSABLE=GR.ID_RESPONSABLE "
                . "INNER JOIN BDMASTER.dbo.PERSONAS P ON P.ID_PERSONA=PR.ID_PERSONA WHERE GR.ID_GERENCIA=:ID_GERENCIA";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":ID_GERENCIA", $id_gerencia, PDO::PARAM_STR);
        if ($return === '1') {
            return $command->queryAll();
        } else {
            return CHtml::listData($command->queryAll(), "ID", "DATOS");
        }
//        return CHtml::listData($command->queryAll(), "ID", "DATOS");
    }

    public static function GetModalidadesContrato() {
        $sql = "SELECT * FROM PATRIMONIO_MODALIDAD_CONTRATOS ORDER BY DESCRIPCION_MODALIDAD ASC";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    public static function GetGerenciasPadre($id) {
        $filter = "";
        if ($id != "") {
            $filter = " AND ID_GERENCIA <> {$id
                    }";
        }
        $sql = "SELECT * FROM PATRIMONIO_GERENCIAS WHERE SW_GERENCIA_PADRE = 1 {$filter}";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    public static function GetLocales() {
        $sql = "SELECT * FROM PATRIMONIO_LOCALES WHERE ESTADO_LOCAL='1'";
        $command = Yii::app()->db->createCommand($sql);
        return CHtml::listData($command->queryAll(), "ID_LOCAL", "DESCRIPCION_LOCAL");
    }

//public static function GetGerencias() {
//        $sql = "SELECT * FROM PATRIMONIO_GERENCIAS";
//        $command = Yii::app()->db->createCommand($sql);
//return $command->queryAll();
//}
}
