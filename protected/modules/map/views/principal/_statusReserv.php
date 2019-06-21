<br>
<div id="estadoReserva" hidden="" class="container-fluid container-fixed-lg">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel panel-default">
                <div class="panel-body">
                    <br>
                    <br>
                    <table class="table-bordered" style="width: 100%">
                        <tr>
                            <td width="175"><b>&nbsp;&nbsp;&nbsp;&nbsp;NOMBRE HOTEL</b></td>
                            <td width="auto">&nbsp;&nbsp;&nbsp;&nbsp;<?= $dataReserva["nombre_hotel"] ?></td>
                        </tr>
                        <tr>
                            <td width="auto"><b>&nbsp;&nbsp;&nbsp;&nbsp;NOMBRES(S)</b></td>
                            <td width="auto">&nbsp;&nbsp;&nbsp;&nbsp;<?= $dataReserva["NOMBRES_PERSONA"] ?></td>
                        </tr>
                        <tr>
                            <td width="auto"><b>&nbsp;&nbsp;&nbsp;&nbsp;APELLIDO(S)</b></td>
                            <td width="auto">&nbsp;&nbsp;&nbsp;&nbsp;<?= $dataReserva["APELLIDO_PATERNO_PERSONA"] . " " . $dataReserva["APELLIDO_MATERNO_PERSONA"] ?></td>
                        </tr>
                        <tr>
                            <td width="auto"><b>&nbsp;&nbsp;&nbsp;&nbsp;FECHA RESERVA</b></td>
                            <td width="auto">&nbsp;&nbsp;&nbsp;&nbsp;<?= Fecha::format($dataReserva["FECHA_RESERVA"], "d-m-Y") ?></td>
                        </tr>
                        <tr>
                            <td width="auto"><b>&nbsp;&nbsp;&nbsp;&nbsp;FECHA EMISIÓN</b></td>
                            <td width="auto">&nbsp;&nbsp;&nbsp;&nbsp;<?= Fecha::format($dataReserva["FECHA_REGISTRO"], "d-m-Y") ?></td>
                        </tr>
                     
                    </table>
                </div>


            </div>

        </div>
    </div>
</div>
