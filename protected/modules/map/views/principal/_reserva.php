<?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'frmReserva',
        ]);
?>
<br>
<!--<div class="panel panel-default">-->
<input type="text" name="ID_HOTEL" id="ID_HOTEL" value="<?= $id_hotel ?>" hidden="">
<div class="col-lg-16 col-lg-offset-0 col-md-14"> 
    <div class=" bg-master-light  panel-default  b-rad-lg">
        <div class="panel-heading">
            <div class="panel-title">
                <b>DATOS DE REPONSABLE</b>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default  required">
                        <label > DOCUMENTO</label>
                        <select class="form-control" name="TIPO_DOCUMENTO_PERSONA" id="TIPO_DOCUMENTO_PERSONA">
                            <option value="1">DNI</option>
                            <option value="2">CARNET EXTRANJERIA</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default required">
                        <label>NUM.DOCUMENTO</label>
                        <!--<div class="row">-->
                        <!--<input type="text" name="NUMERO_DOCUMENTO_PERSONA" class="form-control mayusculas" id="NUMERO_DOCUMENTO_PERSONA">-->
                        <div class="input-group">
                            <input name="NUMERO_DOCUMENTO_PERSONA" id="NUMERO_DOCUMENTO_PERSONA" type="text" class="form-control">
                            <span class="input-group-addon primary">

                                <i class="fa fa-search"></i> 
                            </span>
                        </div>
                        <!--</div>-->
                    </div>
                </div>
                <!--                <div class="col-md-2">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    <button type="button" style="visibility: hidden" id="REGISTRAR_PERSONA" class="btn btn-primary"><i class="fa fa-user"></i></button>
                                </div>-->

                <div id="loading"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="ID_PERSONA" id="ID_PERSONA" hidden="">
                    <div class="form-group form-group-default required">
                        <label>NOMBRES</label>
                        <input type="text" name="NOMBRES_PERSONA" class="form-control mayusculas" id="NOMBRES_PERSONA">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default required">
                        <label>APELLIDO PATERNO</label>
                        <input type="text" name="APELLIDO_PATERNO_PERSONA" class="form-control mayusculas" id="APELLIDO_PATERNO_PERSONA"  >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default required">
                        <label>APELLIDO MATERNO</label>
                        <input type="text" name="APELLIDO_MATERNO_PERSONA" class="form-control mayusculas" id="APELLIDO_MATERNO_PERSONA"  >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default required">
                        <label>FECHA RESERVA</label>
                        <input type="date" name="FECHA_RESERVA" class="form-control" id="FECHA_RESERVA">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default required">
                        <label>TIPO DE HABITACIÓN</label>
<!--                        <input type="date" name="FECHA_INICIO_RESPONSABLE" class="form-control mayusculas" id="FECHA_INICIO_RESPONSABLE"  >-->
                        <div class="radio radio-success">
                            <div class=" col-md-6">
                                <input type="radio" checked="checked" value="1" name="TIPO_HABITACION" id="normal">
                                <label for="normal">Normal</label>
                            </div>
                            <div class=" col-md-6">
                                <input type="radio"  value="2" name="TIPO_HABITACION" id="matrimonial">
                                <label for="matrimonial">Matrimonial</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <!--                <div class="col-md-4">
                                    <div class="form-group form-group-default required">
                                        <label>FECHA_FIN</label>
                                        <input type="date" name="FECHA_FIN_RESPONSABLE" class="form-control mayusculas" id="FECHA_FIN_RESPONSABLE"  >
                                    </div>
                                </div>-->
            </div>
        </div>
    </div>
</div>
<br>
<!--</div>-->
<div class="row" style="text-align: center" id="dv_save">
    <button type="button" class="btn btn-danger btn-xs" id="btn_close"><i class="fa fa-close"></i> Cancelar</button>
    <button type="button" class="btn btn-success btn-xs" id="btn_save"><i class="fa fa-save"></i> Guardar</button>
</div>
<?php $this->endWidget() ?>

<?php
//$url = "http://app.municallao.gob.pe/salud/carnet/carnet/status/id/100/tkn/" . Utils::generateToken(100);
//$api = "https://chart.googleapis.com/chart?cht=qr&chl={$url}&chs=150x150&chld=L|0"
?>      
<!--<img style="width: 100px; height: 100px; position: absolute; left: 650px; margin-right: 95px; margin-left: -65px; top: 200px; margin-top: -110px" id="img_qr"    src="">-->

