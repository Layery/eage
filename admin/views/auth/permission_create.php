<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/27
 * Time: 9:56
 */
use yii\helpers\Html;
use yii\helpers\Url;

//p($model);
?>

<div class="page-content">
    <div class="row">
        <div class="col-xs-10">
            <form class="form-horizontal" role="form" action="<?= Url::toRoute('auth/create') ?>" method="POST">
                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2">
                        作用域范围
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="controllerId" class="col-xs-8 col-sm-5">
                        <span class="help-inline col-xs-12 col-sm-7" style="color: #d84f4b;">
                            <?= $model['error'] ?>
                        </span>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly">
                        操作范围
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="actionId" class="col-xs-8 col-sm-5">
                        <span class="help-inline col-xs-12 col-sm-7" style="color: #d84f4b;">
                            <?= $model['error'] ?>
                        </span>
                    </div>
                </div>

                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly">
                        操作描述
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" name="actionIntro" placeholder="Action introduce" class="col-xs-8 col-sm-5">
                        <span class="help-inline col-xs-12 col-sm-7"></span>
                    </div>
                </div>
                <div class="space-4"></div>


                <div class="space-4"></div>
                <div class="form-group center" >
                    <button class="btn btn-info" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        创建
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="space-6"></div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>节点名称</th>
                        <th>描述</th>
                        <th>类型</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <?php foreach ($model['permission'] as $k => $v) :?>
                    <tr>
                        <td><?= $v->name ?></td>
                        <td><?= $v->description ? $v->description : $v->name; ?></td>
                        <td><?= $v->type ?></td>
                        <td><?= date('Y-m-d', $v->createdAt) ?></td>
                        <td>
                            <a href="javascript:;"> 编辑</a>
                            <a href="javascript:;"> 删除</a>
                        </td>
                    </tr>
                <?php endforeach ;?>
            </table>
        </div>
    </div>
</div>


<script>
    $(function () {
        $("#am-btn-submit").click(function () {
            $("#am-form-1").submit();
        });
        $("#am-btn-clean").click(function () {
            alert('取消');
        });
    });
</script>

