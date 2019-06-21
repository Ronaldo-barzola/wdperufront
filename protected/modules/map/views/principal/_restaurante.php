<?php
$form = $this->beginWidget('CActiveForm', [
    'id' => 'frmCarta',
        ]);
?>
<br>
<!--<div class="panel panel-default">-->
<input type="text" name="ID_RESTAURANTE" id="ID_RESTAURANTE" value="<?= $id_restaurante ?>" hidden="">
<div class="col-lg-16 col-lg-offset-0 col-md-14"> 
    <div class=" bg-master-light  panel-default  b-rad-lg">
        <div class="panel-heading">
            <div class="panel-title">
                <b>CARTA</b>
            </div>
        </div>
        <div class="panel-body">
            <ul id="divCarta" class="list-group">
            </ul>
        </div>
    </div>
</div>
<br>
<!--</div>-->
<div class="row" style="text-align: center" id="dv_save">
    <button type="button" class="btn btn-danger btn-xs" id="btn_close"><i class="fa fa-close"></i> Cerrar</button>
</div>
<?php $this->endWidget() ?>