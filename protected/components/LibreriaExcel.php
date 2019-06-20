<?php

class LibreriaExcel {

    static public function initExcel() {
        $phpWordPath = Yii::getPathOfAlias('ext.*');
        include($phpWordPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
        $PHPExcel = new PHPExcel();
        return $PHPExcel;
    }

    static public function crea_hoja($PHPExcel, $nombre_hoja) {
        $myWorkSheet = new PHPExcel_Worksheet($PHPExcel, $nombre_hoja);
        $PHPExcel->addSheet($myWorkSheet, 0);
    }

    static public function guardar_archivo($ObjectExcel, $nombre_archivo) {
        ob_start();
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"{$nombre_archivo}.xlsx\" ");
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $objWriter = PHPExcel_IOFactory::createWriter($ObjectExcel, 'Excel2007');
        $url=Yii::getPathOfAlias("webroot") . "/excel";
        Utils::existeCarpeta($url);
        $objWriter->save($url. "/{$nombre_archivo}.xlsx");
    }

    

}