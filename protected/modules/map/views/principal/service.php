
<br><br>
<input type="text" name="nombre_region" id="nombre_region" value="<?= $region ?>" hidden="">
<input type="text" name="id_region" id="id_region" hidden="">
<div class="container-fluid container-fixed-lg m-t-50">
    <div class="col-lg-12 col-lg-offset-3 col-md-12">
        <div class="row">
            <div class="col-md-6 m-b-10">
                <div class="ar-3-2 widget-1-wrapper">
                    <!-- START WIDGET widget_imageWidget-->
                    <div style="background-image: url('../../../../themes/01/img/dashboard/<?= $region ?>.jpg');
                         background-size: cover;
                         content: ' ';
                         left: 0;
                         right: 0;
                         top: 0;
                         bottom: 0;
                         position: absolute;
                         z-index: 0;
                         opacity: .95;" class="panel no-border bg-complete no-margin widget-loader-circle-lg">

                        <div class="panel-heading">
                            <span class="label font-montserrat text-info fs-15" id="nombreRegion"></span>
                        </div>
                        <div class="panel-body">
                            <div class="pull-top bottom-right bottom-right ">

                                <h2 class="text-white"></h2>
                                <p class="text-black hint-text label"><b id="aliasRegion"></b></p>
                                <div class="row stock-rates m-t-15">
                                    <div class="company col-xs-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <b >DESCRIPCIÓN</b>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <i id="descripcionRegion"></i>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <b>RESTAURANTES</b>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div id="divRestaurante"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <b>HOSPEDAJE</b>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div id="divHospedaje"></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <b>ATRACTIVOS TURISTICO</b>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <div id="divTurismo"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>