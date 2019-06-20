<?php

class Fecha {

    public static function format($fecha, $formato_nuevo) {
        if (trim($fecha) == '') {
            $fecha = '01/01/1900';
        }
        return date($formato_nuevo, strtotime($fecha));
    }

    public static function getMonthAll($zerofield = false, $abrev = false) {
        $months = [
            1 => "ENERO",
            2 => "FEBRERO",
            3 => "MARZO",
            4 => "ABRIL",
            5 => "MAYO",
            6 => "JUNIO",
            7 => "JULIO",
            8 => "AGOSTO",
            9 => "SEPTIEMBRE",
            10 => "OCTUBRE",
            11 => "NOVIEMBRE",
            12 => "DICIEMBRE",
        ];

        if ($zerofield) {
            foreach ($months as $idMonth => $month) {
                $idZero = ($idMonth < 10) ? "0" . $idMonth : $idMonth;
                unset($months[$idMonth]);
                $months[$idZero] = $month;
            }
        }

        if ($abrev) {
            return self::monthsAbreviatures($months);
        }

        return $months;
    }

    public static function monthAbreviature($month) {
        return substr($month, 0, 3);
    }

    public static function monthsAbreviatures($months = []) {
        $month_abrev = [];

        foreach ($months as $id => $month) {
            $month_abrev[$id] = self::monthAbreviature($month);
        }

        return $month_abrev;
    }

    public static function getMonthById($id, $abrev = false) {
        $months = self::getMonthAll();

        if (!isset($months[$id])) {
            return "";
        }

        if ($abrev) {
            return self::monthAbreviature($months[$id]);
        }

        return $months[$id];
    }

    public static function obtenerMeses($id = false) {
        $meses = [
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre",
        ];
        if ($id) {
            return $meses[$id];
        }
        return $meses;
    }

}
