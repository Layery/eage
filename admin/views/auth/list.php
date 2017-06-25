<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/26
 * Time: 17:56
 */

use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Url;
use yii\grid\GridView;
use common\widgets\Alert;
use common\models\User;
$this->title = 'AuthManage';
$this->params['breadcrumbs'][] = $this->title;
$Bright = yii::$app->right;
$user = User::model();
?>
<div class="page-content">
    <div class="page-header">
        <div class="row" style="height: auto;">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>角色名称</td>
                            <td>
                                <label for="">
                                    <input type="text" class="col-xs-12">
                                </label>
                            </td>
                            <td>角色名称</td>
                            <td>
                                <label for="">
                                    <input type="text" class="col-xs-12">
                                </label>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th class="center">
                                <a href="<?= Url::toRoute(['auth/role']) ?>">
                                    <button class="btn btn-info" type="button">
                                        <i class="icon-ok bigger-110"></i>
                                        新增
                                    </button>
                                </a>
                                <button class="btn btn-success" type="button">
                                    <i class="icon-ok bigger-110"></i>
                                    检索
                                </button>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="center">
                            <label>
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="hidden-480">Description</th>

                        <th>
                            <i class="icon-time bigger-110 hidden-480"></i>
                            Create_at
                        </th>
                        <th class="hidden-480">
                            Update_at
                        </th>

                        <th>
                            操作项
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dataProvider as $k => $v) :?>
                        <tr>
                            <td class="center">
                                <label>
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td>
                                <a href="javascript:;">3</a>
                            </td>
                            <td>
                                <?= $v->name ?>
                            </td>
                            <td class="hidden-480">
                                <?= $v->description ? $v->description : $v->name ?>
                            </td>
                            <td>
                                <?= date('Y-m-d', $v->createdAt) ?>
                            </td>
                            <td>
                                <?= date('Y-m-d', $v->updatedAt) ?>
                            </td>
                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                    <button class="btn btn-xs btn-info">
                                        <i class="icon-edit bigger-120"></i>
                                    </button>

                                    <button class="btn btn-xs btn-danger">
                                        <i class="icon-trash bigger-120"></i>
                                    </button>
                                </div>

                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-cog icon-only bigger-110"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                    <span class="blue">
                                                        <i class="icon-zoom-in bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                    <span class="green">
                                                        <i class="icon-edit bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                    <span class="red">
                                                        <i class="icon-trash bigger-120"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function changeStatus(id) {
        var csrf = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url : 'index.php?r=auth/ajaxchangestatus',
            type : 'POST',
            data : {'id': id, '_csrf': csrf},
            dataType : 'json',
            success: function (rs) {
                console.log(rs);
            }
        });
    }
</script>