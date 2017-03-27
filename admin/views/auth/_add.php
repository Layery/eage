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



<div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active"><a href="#tab1">基本信息</a></li>
        <li><a href="#tab2">选择权限</a></li>
    </ul>

    <div class="am-tabs-bd">
        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
            <form class="am-form" action="<?= Url::toRoute('auth/create');?>" method="post" id="am-form-1">
            <div class="am-g am-margin-top">
                <div class="am-u-sm-4 am-u-md-2 am-text-right">角色名称</div>
                <div class="am-u-sm-8 am-u-md-10">
                    <input type="text" class="am-input-sm" name="name">
                </div>
            </div>

            <div class="am-g am-margin-top">
                <div class="am-u-sm-4 am-u-md-2 am-text-right">显示状态</div>
                <div class="am-u-sm-8 am-u-md-10">
                    <div class="am-btn-group" data-am-button>
                        <label class="am-btn am-btn-primary am-btn-xs">
                            <input type="radio" name="status" id="option1" checked="checked" value="1"> 正常
                        </label>
                        <label class="am-btn am-btn-primary am-btn-xs">
                            <input type="radio" name="status" id="option2" value="0"> 禁用
                        </label>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="am-tab-panel am-fade" id="tab2">
            <form class="am-form" action="<?= Url::toRoute('auth/create');?>" method="post" id="am-form-2">
                <?php foreach ($authAction->data as $controller => $row):?>
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                         <?= $row['label'];?>
                    </div>
                    <div class="am-btn-group" data-am-button>
                           <?php foreach ($row['option'] as $action => $row):?>
                               <label class="am-btn am-btn-primary am-btn-xs">
                                   <input type="checkbox" name="actions[<?= $controller ?>][]" value="<?= $action;?>"> <?= $row['label'] ?> <span></span>
                               </label>
                           <?php endforeach;?>
                    </div>
                </div>
                <?php endforeach;?>
            </form>
        </div>
    </div>
</div>

<div class="am-margin">
    <button type="button" class="am-btn am-btn-primary am-btn-xs" id="am-btn-submit">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs" id="am-btn-clean">放弃保存</button>
</div>

<script>
    $(function(){
        $("#am-btn-submit").click(function(){
            $("#am-form-1").submit();
            $("#am-form-2").submit();
        });

        $("#am-btn-clean").click(function(){
            alert('取消');
        });
    });
</script>
