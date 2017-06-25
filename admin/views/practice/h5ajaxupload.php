<?php


use yii\helpers\Url;
use admin\assets\AceAsset;

AceAsset::register($this);
$this->title = 'H5 ajax upload';

?>


<!DOCTYPE html>
<html>
<head>
<title><?= $this->title ?></title>
</head>
<body>
    <form action="<?= Url::toRoute('practice/upload'); ?>" method="POST" id="form">
        姓名: <input type="text" name="name"/><br>
        头像: <input type="file" name="header">
    </form>
    <button id="submit" >提交</button>
</body>
</html>

<script>
    $(function(){
        $("#submit").click(function(){
            var FormObject = new FormData($("#form"));
            console.log(FormObject);
        });
    });
</script>
