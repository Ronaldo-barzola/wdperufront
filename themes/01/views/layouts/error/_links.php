<!--<link href="<?= Yii::app()->baseUrl ?>/resource/libs/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />-->
<link href="<?= Yii::app()->baseUrl ?>/resource/libs/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= Yii::app()->baseUrl ?>/resource/libs/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link class="main-stylesheet" href="<?= Yii::app()->theme->baseUrl ?>/css/pages.css" rel="stylesheet" type="text/css" />
<!--[if lte IE 9]>
    <link href="<?= Yii::app()->theme->baseUrl ?>/css/ie9.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript">
    window.onload = function ()
    {
        // fix for windows 8
        if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl ?>/css/windows.chrome.fix.css" />'
    }
</script>