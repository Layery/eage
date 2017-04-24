<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/27
 * Time: 9:56
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="page-content">
    <div class="row">
        <div class="col-xs-10">
            <form class="form-horizontal" role="form">
                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2">
                        作用域范围
                    </label>
                    <div class="col-sm-9">
                        <input type="password" id="form-field-2" placeholder="作用域范围即控制器id" class="col-xs-8 col-sm-5">
                        <span class="help-inline col-xs-12 col-sm-7">
                    </span>
                    </div>
                </div>

                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly">
                        操作范围
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" placeholder="操作范围即动作id" class="col-xs-8 col-sm-5">
                        <span class="help-inline col-xs-12 col-sm-7"></span>
                    </div>
                </div>

                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly">
                        操作描述
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" placeholder="Action introduce" class="col-xs-8 col-sm-5">
                        <span class="help-inline col-xs-12 col-sm-7"></span>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly">
                        是否启用
                    </label>
                    <div class="col-xs-3">
                        <label>
                            <input name="switch-field-1" class="ace ace-switch ace-switch-5" type="checkbox" checked>
                            <span class="lbl"></span>
                        </label>
                    </div>
                </div>

                <div class="space-4"></div>
                <div class="form-group center" >
                    <button class="btn btn-info" type="button">
                        <i class="icon-ok bigger-110"></i>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="space-6"></div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <tr>
                    <td>aaaaaaa</td>
                    <td>aaaaaaa</td>
                    <td>aaaaaaa</td>
                    <td>aaaaaaa</td>
                    <td>aaaaaaa</td>
                    <td>aaaaaaa</td>
                </tr>
                <tr>
                    <td>aaaaaaa</td>
                    <td>aaaaaaa</td>
                    <td>aaaaaaa</td>
                    <td>aaaaaaa</td>
                    <td>aaaaaaa</td>
                    <td>aaaaaaa</td>
                </tr>
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

