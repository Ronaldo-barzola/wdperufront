<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <div class="sidebar-overlay-slide from-top" id="appMenu">
        <?php // PROFILES::GenerateAppMenu() ?>
    </div>
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <div class="hidden-md hidden-lg hidden-xlg">
            <img src="<?= Yii::app()->baseUrl ?>/resource/images/logo-white-small.png" alt="logo" class="brand" data-src="<?= Yii::app()->baseUrl ?>/resource/images/logo-white-small.png" data-src-retina="<?= Yii::app()->baseUrl ?>/resource/images/logo-white-small.png" width="160" height="40">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu">
                <i class="icon-set grid-box"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            <br>
            <li>
                <a href="<?= Yii::app()->baseUrl ?>" style="width: 90%"><i class="pg-home"></i> Inicio
                </a>
            </li>
            <?= PROFILES::GenerateMenu(); ?>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
<!-- END SIDEBPANEL-->