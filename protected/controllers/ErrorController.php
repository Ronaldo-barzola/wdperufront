<?php

class ErrorController extends Auth {

    public $defaultAction = 'show';
    public $layout = "//layouts/error";

    public function actionShow() {
        if ($error = Yii::app()->errorHandler->error) {
            $this->pageTitle = $error["code"];     
            $this->render("index", [
                'error' => $error
            ]);
        } else {
            $this->redirect(["/"]);
        }
    }

}
