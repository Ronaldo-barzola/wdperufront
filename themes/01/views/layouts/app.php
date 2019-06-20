<!DOCTYPE html>
<html>
    <head>
        <?php $profiles = '<script language="JavaScript" type="text/javascript" src="' . Yii::app()->createUrl("") . '/themes/01/js/profile.min.js"></script> ';
        ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title><?= Constante::GERENCIA." - ".ucfirst(CHtml::encode(Yii::app()->controller->module->id)); ?></title>
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
        <?php $this->renderPartial("//layouts/app/_menu"); ?>
        <!-- START PAGE-CONTAINER -->
        <div class="page-container ">
            <?php $this->renderPartial("//layouts/app/_header"); ?>
            <!-- START PAGE CONTENT WRAPPER -->
            <div class="page-content-wrapper">
                <!-- START PAGE CONTENT -->
                <div class="content">
                    <?php if ($this->breadcrumbs): ?>
                        <!-- START JUMBOTRON -->
                        <div class="jumbotron" data-pages="parallax">
                            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                                <div class="inner">
                                    <!-- START BREADCRUMB -->
                                    <?php
                                    $this->widget('zii.widgets.CBreadcrumbs', array(
                                        'links' => $this->breadcrumbs,
                                        'homeLink' => false,
                                        'htmlOptions' => array('class' => 'breadcrumb'),
                                        'tagName' => 'ul',
                                        'separator' => '',
                                        'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                                        'inactiveLinkTemplate' => '<li><a href="#" class="active">{label}</a></li>'
                                    ));
                                    ?>
                                    <!-- END BREADCRUMB -->
                                </div>
                            </div>
                        </div>
                        <!-- END JUMBOTRON -->
                    <?php endif; ?>
                    <!-- START CONTAINER FLUID -->
                    <?php if (!empty($flash = yii::app()->user->getFlash("system"))): ?>
                        <div class="flashes alert alert-<?= $flash["type"] ?>">
                            <div class="container">
                                <strong><?= $flash["title"] ?></strong> <?= $flash["msg"] ?>
                                <div class="pull-right">
                                    <i class="fa fa-times"></i>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!--<div class="container-fluid container-fixed-lg">-->
                    <?= $content.$profiles ?>  
                    <!--</div>-->
                    <!-- END CONTAINER FLUID -->
                </div>
                <!-- END PAGE CONTENT -->
                <?php $this->renderPartial("//layouts/app/_footer"); ?>
            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTAINER -->
        <?php $this->renderPartial("//layouts/app/_lock"); ?>
        <?php $this->renderPartial("//layouts/app/_scripts"); ?>
    </body>
</html>