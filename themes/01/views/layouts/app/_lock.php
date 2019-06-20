<!-- Modal -->
<div class="modal fade fill-in" id="modalLock" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="pg-close"></i>
    </button>
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row ">
                    <div class="col-xs-12 text-center p-b-20">
                        <a href="<?= Yii::app()->createUrl("logout") ?>" class="btn btn-primary btn-sm m-b-10">
                            Cerrar Sesión <i class="pg-power"></i>
                        </a>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="inline">
                            <div class="thumbnail-wrapper circular d48 m-r-10 bg-primary border-primary">
                                <img width="43" height="43" data-src-retina="<?= Params::urlFile(false, "img_user_x69") ?>" data-src="<?= Params::urlFile(false, "img_user_x69") ?>" alt="" src="<?= Params::urlFile(false, "img_user_x69") ?>">
                            </div>
                        </div>
                        <div class="inline">
                            <h5 class="logged hint-text no-margin">
                                Conectado como
                            </h5>
                            <h2 class="name no-margin">Jose Vilchez</h2>
                        </div>

                    </div>
                    <div class="col-sm-6">

                        <form id="form-lock" role="form" action="index.html" novalidate="novalidate">
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="form-group form-group-default sm-m-t-30">
                                        <label>Contraseña</label>
                                        <div class="controls">
                                            <input type="password" name="password" placeholder="Contraseña para desbloquear" class="form-control error" required="" aria-required="true" aria-invalid="true">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="#" class="inline text-black fs-14 hint-text"><i class="pg-mail"></i> <span class="hint-text">12</span></a>
                                    <a href="#" class="inline text-black  fs-14 hint-text m-l-30"><i class="pg-comment"></i> <span class="hint-text">4</span></a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                <div class="row hidden">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default m-t-40">
                            <div class="panel-body p-t-20 text-center">
                                <h2 class="text-center text-primary"><strong>Iniciar Sesión</strong></h2>
                                <div class="p-l-45 p-b-45 p-r-50 p-t-20">
                                    <form class="" id="kfk-form1" role="form" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control text-center" placeholder="Ingresa tu nombre de usuario" autofocus="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control text-center" placeholder="Ingrese tu contraseña">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block text-center">Ingresar</button>
                                        <br>
                                        <div>¿Olvidaste tus credenciales?</div>
                                        <a href="signup.html" class="link">Recuperar cuenta</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <button class="btn btn-danger m-t-10">Cancelar</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Modal -->