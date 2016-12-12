<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Layery</title>
    <?= Html::jsFile('@web/js/easyui/jquery.min.js') ?>
    <?= Html::jsFile('@web/js/easyui/jquery.easyui.min.js') ?>
    <?= Html::cssFile('@web/css/themes/demo.css') ?>
    <?= Html::cssFile('@web/css/themes/icon.css') ?>
    <?= Html::cssFile('@web/css/themes/default/easyui.css') ?>
</head>
<body class="easyui-layout">
<h2>Layout</h2>
<div style="margin:20px 0;"></div>
<?= $this->render('/common/top') ?>
<?= $this->render('/common/left') ?>
<!--<div data-options="region:'center',title:">-->
<div data-options=<?php echo "\"region:'center',title:'asd'\""; ?> >
    <?php echo $content; ?>
</div>


</body>
</html>

<?php $this->endPage() ?>