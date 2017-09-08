<?php


use yii\helpers\Url;
use admin\assets\AceAsset;

AceAsset::register($this);
$this->title = 'H5 ajax upload';

?>


<div class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <form class="form-horizontal" role="form" action="<?= Url::toRoute('practice/upload'); ?>" method="POST" id="form">
                姓名：
                <div class="form-group">
                    <div class="col-sm-9">
                        <input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5">
                    </div>
                </div>

            </form>
        </div>
    </div>  
</div>