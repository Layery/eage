<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;


?>
<div data-options="region:'west',split:true,title:'系统菜单'" style="width:150px;padding:10px;">

    <ul class="easyui-tree">
        <li>
            <span ><?= Html::a('CateManage', ['cate/list']) ?></span>
        </li>
        <li>
            <span ><?= Html::a('ArticleManage', ['article/list']) ?></span>
        </li>
    </ul>

</div>