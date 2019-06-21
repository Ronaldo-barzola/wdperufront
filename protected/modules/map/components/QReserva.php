<?php

Class QReserva {

    public static function fyndReservaById($id) {
        $sql = "SELECT * FROM RESERVA_HOTEL RH
        INNER JOIN TIPO_HABITACIONES TH ON TH.ID_TIPO_HABITACION=RH.TIPO_HABITACION
        INNER JOIN HOTELES H ON H.ID_HOTEL=RH.ID_HOTEL
        WHERE RH.ID_RESERVA=:ID_RESERVA";
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":ID_RESERVA", $id, PDO::PARAM_INT);
        return $command->queryRow();
    }

}
