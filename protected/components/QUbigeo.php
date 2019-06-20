<?php

Class QUbigeo {

    public static function listDepartamento() {
        $sql = "SELECT ID_DEPARTAMENTO,NOMBRE_DEPARTAMENTO FROM BDMASTER.dbo.DEPARTAMENTOS";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }
    
    public static function listar_departamentos() {
        $sql = "SELECT ID_DEPARTAMENTO,NOMBRE_DEPARTAMENTO FROM BDMASTER.dbo.DEPARTAMENTOS ORDER BY (CASE WHEN NOMBRE_DEPARTAMENTO = 'CALLAO' THEN 1 ELSE 2 END), NOMBRE_DEPARTAMENTO";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    public static function ListProvincia($id) {
        $sql = "select ID_PROVINCIA,NOMBRE_PROVINCIA from BDMASTER.dbo.PROVINCIAS WHERE  cast(SUBSTRING(UBIGEO_PROVINCIA, 1, 2) as int)=:id order by NOMBRE_PROVINCIA asc";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":id", $id, PDO::PARAM_INT);
        return $command->queryAll();
    }
    
    public static function listar_provincias($departamento = false) {
        if($departamento == false){
            $sql = "SELECT ID_PROVINCIA,NOMBRE_PROVINCIA FROM BDMASTER.dbo.PROVINCIAS ORDER BY (CASE WHEN NOMBRE_PROVINCIA = 'CALLAO' THEN 1 ELSE 2 END), NOMBRE_PROVINCIA";
        }else{
            $sql = "SELECT ID_PROVINCIA,NOMBRE_PROVINCIA FROM BDMASTER.dbo.PROVINCIAS WHERE CAST(SUBSTRING(UBIGEO_PROVINCIA, 1, 2) as INT)={$departamento} order by NOMBRE_PROVINCIA asc";
        }
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

    public static function ListDistrito($departamento, $provincia) {
        $sql = "select ID_DISTRITO, NOMBRE_DISTRITO from BDMASTER.dbo.DISTRITOS 
                where cast(SUBSTRING(UBIGEO_DISTRITO, 1, 2) as int)=(select cast(SUBSTRING(UBIGEO_PROVINCIA, 1, 2) as int) from BDMASTER.dbo.PROVINCIAS where ID_PROVINCIA=:departamento) 
                and cast(SUBSTRING(UBIGEO_DISTRITO, 3, 2) as int)=(select cast(SUBSTRING(UBIGEO_PROVINCIA, 3, 2) as int) from BDMASTER.dbo.PROVINCIAS where ID_PROVINCIA=:provincia) 
                order by NOMBRE_DISTRITO asc";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":departamento", $departamento, PDO::PARAM_INT);
        $command->bindParam(":provincia", $provincia, PDO::PARAM_INT);
        return $command->queryAll();
    }
    
    public static function listar_distritos($departamento = false, $provincia = false) {
        if($departamento == false && $provincia == false){
            $sql = "SELECT ID_DISTRITO,NOMBRE_DISTRITO FROM BDMASTER.dbo.DISTRITOS";
        }else{
            $sql = "SELECT ID_DISTRITO,NOMBRE_DISTRITO FROM BDMASTER.dbo.DISTRITOS where cast(SUBSTRING(UBIGEO_DISTRITO, 1, 2) as int)=(select cast(SUBSTRING(UBIGEO_PROVINCIA, 1, 2) as int) from BDMASTER.dbo.PROVINCIAS where ID_PROVINCIA={$departamento}) 
                and cast(SUBSTRING(UBIGEO_DISTRITO, 3, 2) as int)=(select cast(SUBSTRING(UBIGEO_PROVINCIA, 3, 2) as int) from BDMASTER.dbo.PROVINCIAS where ID_PROVINCIA={$provincia}) 
                order by NOMBRE_DISTRITO asc";
        }
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }
    
    public static function listTipoUrb() {
        $sql = "SELECT ID_TIPO_URBANIZACION,NOMBRE_TIPO_URBANIZACION FROM BDMASTER.dbo.TIPO_URBANIZACIONES ORDER BY NOMBRE_TIPO_URBANIZACION";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }
    
    public static function listHabilitaciones() {
        $sql = "SELECT ID_HABILITACION_URBANA,DESCRIPCION_HABILITACION_URBANA FROM BDMASTER.dbo.HABILITACIONES_URBANAS";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }
    
    public static function listTipoVias() {
        $sql = "SELECT ID_TIPO_VIA,NOMBRE_TIPO_VIA FROM BDMASTER.dbo.TIPO_VIAS ORDER BY NOMBRE_TIPO_VIA";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }
    
    public static function listVias() {
        $sql = "SELECT ID_VIA,DESCRIPCION_VIA FROM BDMASTER.dbo.VIAS";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }
     
    public static function listTipoInteriores() {
        $sql = "SELECT ID_TIPO_INTERIOR,NOMBRE_TIPO_INTERIOR FROM BDMASTER.dbo.TIPO_INTERIORES";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }
    
    public static function listTipoEdificaciones() {
        $sql = "SELECT ID_TIPO_EDIFICACION,NOMBRE_TIPO_EDIFICACION FROM BDMASTER.dbo.TIPO_EDIFICACIONES";
        $command = Yii::app()->db->createCommand($sql);
        return $command->queryAll();
    }

}
