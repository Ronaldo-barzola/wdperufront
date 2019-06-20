<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title><?= CHtml::encode($this->pageTitle); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        <link rel="apple-touch-icon" href="<?= Utils::host("/resource", true) ?>/ico/60.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= Utils::host("/resource", true) ?>/ico/76.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= Utils::host("/resource", true) ?>/ico/120.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= Utils::host("/resource", true) ?>/ico/152.png">
        <link rel="icon" type="image/x-icon" href="./favicon.ico" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <?php $this->renderPartial("//layouts/error/_links"); ?>
    </head>
    <body class="fixed-header error-page">
        <?= $content ?>
        <?php $this->renderPartial("//layouts/error/_scripts"); ?>
    </body>
</html>