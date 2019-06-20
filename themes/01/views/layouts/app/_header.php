<div class="header ">
    <!-- START MOBILE CONTROLS -->
    <div class="container-fluid relative">
        <!-- LEFT SIDE -->
        <div class="pull-left full-height visible-sm visible-xs">
            <!-- START ACTION BAR -->
            <div class="header-inner">
                <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
                    <span class="icon-set menu-hambuger"></span>
                </a>
            </div>
            <!-- END ACTION BAR -->
        </div>
        <div class="pull-center hidden-md hidden-lg">
            <div class="header-inner">
                <div class="brand inline">
                    <img src="<?= Yii::app()->baseUrl ?>/resource/images/isotipo-white-small.png" alt="logo" data-src="<?= Yii::app()->baseUrl ?>/resource/images/isotipo-white-small.png" data-src-retina="<?= Yii::app()->baseUrl ?>/resource/images/isotipo-white-small.png" width="40" height="40">
                </div>
            </div>
        </div>  
    </div>
    <!-- END MOBILE CONTROLS -->
    <div class=" pull-left sm-table hidden-xs hidden-sm">
        <div class="header-inner">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu">
                <i class="icon-set grid-box"></i>
            </button>
            <div class="brand inline">
                <img src="<?= Yii::app()->baseUrl ?>/resource/images/logo-white-small.png" alt="logo" data-src="<?= Yii::app()->baseUrl ?>/resource/images/logo-white-small.png" data-src-retina="<?= Yii::app()->baseUrl ?>/resource/images/logo-white-small.png" width="180" height="50">
            </div>
        </div>
    </div>
    <div class=" pull-right">
        <!-- START User Info-->
        <div class="visible-lg visible-md m-t-10">
            <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
                <?php
                if (Yii::app()->user->id != "") {
                    $USUARIO = PROFILES::FindUser(Yii::app()->user->id);
                    ?>
                    <span class="semi-bold">Bienvenido: <?= $USUARIO["APELLIDO_PATERNO_PERSONA"] ?></span> <span class="text-master"><?= explode(' ', trim($USUARIO["NOMBRES_PERSONA"]))[0] ?></span>
                <?php } else { ?>
                    <span class="semi-bold">Usuario no encontrado</span> <span class="text-master"></span>
                <?php } ?>
            </div>
            <div class="dropdown pull-right">
                <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="thumbnail-wrapper d32 circular bg-primary inline m-t-5">
                        <img src="<?= Params::urlFile(false, "img_user_x69") ?>" alt="" data-src="<?= Params::urlFile(false, "img_user_x69") ?>" data-src-retina="<?= Params::urlFile(false, "img_user_x69") ?>" width="32" height="32">
                    </span>
                </button>
                <ul class="dropdown-menu profile-dropdown" role="menu">
                    <?php if (Yii::app()->user->id != "") { ?>
                        <li><a href="<?= Utils::host("/pad/account/principal/index/id/" . Yii::app()->user->id . "/tkn/" . Utils::generateToken(Yii::app()->user->id)) ?>"   ><i class="pg-settings_small"></i> Mi cuenta</a></li>
                    <?php } ?>
                    <li class="bg-master-lighter">
                        <a href="<?= Yii::app()->createUrl("login/logout") ?>" class="clearfix">
                            <span class="pull-left">Salir</span>
                            <span class="pull-right"><i class="pg-power"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END User Info-->
    </div>
</div>