<?php

class Images {

    public static function thumbnail($urlImage, $nameImage, $size) {
        Yii::import("ext.easyimage.*");

        Folder::create("{$urlImage}/thumbnail/");

        $image     = $urlImage . "/" . $nameImage;
        $thumbnail = new EasyImage($image);

        $thumbnail->resize(NULL, $size, EasyImage::RESIZE_HEIGHT);
        $thumbnail->save("{$urlImage}/thumbnail/" . Files::getName($nameImage) . "_{$size}x{$size}." . Files::getExtension($nameImage));
    }

}
