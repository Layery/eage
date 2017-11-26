<?php 
use yii\helpers\Url;
?>

<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-home home-icon"></i>
            <a href="#">Home</a>
        </li>

        <li>
            <a href="#">Tables</a>
        </li>
        <li class="active">Simple &amp; Dynamic</li>
    </ul><!-- .breadcrumb -->

    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
                <i class="icon-search nav-search-icon"></i>
            </span>
        </form>
    </div><!-- #nav-search -->
</div>
<div class="page-content">
    <div class="page-header"></div>
    <br>
    <div class="row">
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