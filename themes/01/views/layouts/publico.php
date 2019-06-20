<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title><?= CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        <link rel="apple-touch-icon" href="<?= Utils::host(Yii::app()->theme->baseUrl) ?>/ico/60.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= Utils::host(Yii::app()->theme->baseUrl) ?>/ico/76.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= Utils::host(Yii::app()->theme->baseUrl) ?>/ico/120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= Utils::host(Yii::app()->theme->baseUrl) ?>/ico/152.png">
        <link rel="icon" type="image/x-icon" href="<?= Yii::app()->createUrl("/themes/01/img/favicon.ico") ?>" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <?php $this->renderPartial("//layouts/app/_links"); ?>
    </head>
    <body class="fixed-header menu-pin menu-behind">
        <!-- START PAGE-CONTAINER -->
        <div class="page-container ">
            <?php $this->renderPartial("//layouts/login/_header"); ?>
            <!-- START PAGE CONTENT WRAPPER -->
                <!-- START PAGE CONTENT -->
                    <!--<div class="container-fluid container-fixed-lg">-->
                    <?= $content ?>  
                    <!--</div>-->
                    <!-- END CONTAINER FLUID -->
                <!-- END PAGE CONTENT -->
                <?php $this->renderPartial("//layouts/login/_footer"); ?>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTAINER -->
        <?php $this->renderPartial("//layouts/app/_scripts"); ?>
    </body>
</html>