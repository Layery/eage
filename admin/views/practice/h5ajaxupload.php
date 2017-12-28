<?php 
use yii\helpers\Url;
?>

<div class="page-content">
    <div class="page-header"></div>
    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" role="form" action="<?= Url::toRoute('practice/upload'); ?>" method="POST" id="form">
                <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1">手机号：</label>
                    <div class="col-sm-8">
                        <input type="text" id="form-field-1" placeholder="请输入..." class="col-xs-10 col-sm-5"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1">文件：</label>
                    <div class="ace-file-input col-sm-3">
                        <input type="file" id="id-input-file-2">
                        <label class="file-label" data-title="Choose">
                        <span class="file-name" data-title="No File ...">
                        <i class="icon-upload-alt"></i>
                        </span>
                        </label>
                        <a class="remove" href="#">
                            <i class="icon-remove"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>