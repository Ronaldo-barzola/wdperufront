
<script type="text/javascript">
    var Request = {
        Host: '<?= Yii::app()->request->hostInfo ?>',
        BaseUrl: '<?= Yii::app()->baseUrl ?>',
        themeUrl: '<?= Yii::app()->theme->baseUrl ?>',
        _GET: <?= json_encode($_GET) ?>,
        UrlHash: {
            m: '<?= strtolower($this->module->id) ?>',
            c: '<?= strtolower($this->id) ?>',
            a: '<?= strtolower($this->action->id) ?>'
        },
        guest: <?= (Yii::app()->user->isGuest) ? "true" : "false" ?>};
</script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/classie/classie.js"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/js/settings.app.min.js"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/pace-master/pace.js" type="text/javascript"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/boostrap-form-wizard/js/form_wizard.js" type="text/javascript"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/rdi/js/nouislider.min.js" type="text/javascript"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/rdi/js/jquery.min.js" type="text/javascript"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/rdi/js/jquerymousewheel.min.js" type="text/javascript"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/rdi/js/raphael.min.js" type="text/javascript"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/rdi/js/jquery.mapael.js" type="text/javascript"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/rdi/js/maps/peru.js" type="text/javascript"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/rdi/peru.js" type="text/javascript"></script>

<!--<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>-->

<!--<script src="assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>-->
<!--config.js De los modulos-->
<?php
Assets::setModule($this->module->id);
Assets::configModule();
?>
<!--fin-->
<script src="<?= Yii::app()->request->baseUrl ?>/resource/libs/require.js"></script>
<script src="<?= Yii::app()->request->baseUrl ?>/resource/js/common.min.js"></script>