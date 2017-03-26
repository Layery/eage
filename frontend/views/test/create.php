<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/26
 * Time: 13:05
 */
use yii\helpers\Url;
?>

<div class="row">
    <form action="<?= Url::toRoute('test/curl') ?>" class="form" method="POST">
        <div class="form-group">
            <label for="form-group-name">姓名</label>
            <input type="text" name="name">
            <span class="input-error"><?= $model->getFirstError('name')?></span>
        </div>
        <div class="form-group">
            <label for="form-group-age">年龄</label>
            <input type="text" name="age">
            <span class="input-error"><?= $model->getFirstError('age')?></span>
        </div>
        <div class="form-group">
            <label for="form-group-sex">性别</label>
            男 <input type="radio" name="sex" value="1">
            女 <input type="radio" name="sex" value="2">
            <span class="input-error"><?= $model->getFirstError('sex')?></span>
        </div>
        <div class="form-group">
            <label for="form-group-address">地址</label>
            <input type="text" name="address">
            <span class="input-error"><?= $model->getFirstError('address')?></span>
        </div>
        <div class="form-group">
            <label for="form-group-mobile">手机</label>
            <input type="text" name="mobile">
            <span class="input-error"><?= $model->getFirstError('mobile')?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </form>


</div>

<script>
    $(function(){
        $(".input-error").css('color','orangered');
    })
</script>