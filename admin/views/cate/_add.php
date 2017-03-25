<?php
use yii\helpers\Html;
?>
<br>
<div id="test">
    <?= Html::beginForm('cate/create', 'post') ?>
        <?= Html::dropDownList('上级栏目', null,[],['options' => ['a' => ['disabled' => true]]]) ?>
    <?= Html::endForm() ?>
</div>
<script>

    function submitForm(){
        var test = $("#test");
        $('#ff').form('submit', {
            url : 'index.php?r=cate/create',
            success : function(data) {
                var data = eval('('+data+')');
                if (data.code == 0) {
                    $.messager.show({
                        title : '消息提醒',
                        msg : data.msg,
                        timeout : 1000
                    });
                }
            }
        });
    }


    function clearForm(){
        $('#ff').form('clear');
    }
</script>