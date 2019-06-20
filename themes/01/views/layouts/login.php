<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Pages - Admin Dashboard UI Kit - Blank Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        <link rel="apple-touch-icon" href="<?= Utils::host(Yii::app()->theme->baseUrl) ?>/ico/60.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= Utils::host(Yii::app()->theme->baseUrl) ?>/ico/76.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= Utils::host(Yii::app()->theme->baseUrl) ?>/ico/120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= Utils::host(Yii::app()->theme->baseUrl) ?>/ico/152.png">
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <?php $this->renderPartial("//layouts/login/_links"); ?>
    </head>
    <!--<body class="fixed-header menu-pin menu-behind" id="login" style="background: url('resource/images/bg-login.jpg'); background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">-->
    <body class="fixed-header menu-pin menu-behind" id="login">
        <!-- START PAGE-CONTAINER -->
        <div class="page-container ">
            <?php $this->renderPartial("//layouts/login/_header"); ?>
            <!-- START PAGE CONTENT -->
            <?= $content ?>
            <!-- END PAGE CONTENT -->
            <?php $this->renderPartial("//layouts/login/_footer"); ?>
        </div>
        <!-- END PAGE CONTAINER -->
        <?php $this->renderPartial("//layouts/login/_scripts"); ?>
    </body>
</html>