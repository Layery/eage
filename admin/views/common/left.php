<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;


?>
<div data-options="region:'west',split:true,title:'系统菜单'" style="width:150px;padding:10px;">
<!--    <ul class="easyui-tree">-->
<!--        <li>-->
<!--            <span>My Documents</span>-->
<!--            <ul>-->
<!--                <li data-options="state:'closed'">-->
<!--                    <span>Photos</span>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <span>Program Files</span>-->
<!--                </li>-->
<!--                <li>--><?//= Html::a('测试连接',['site/tree']) ?><!--</li>-->
<!--                <li>about.html</li>-->
<!--                <li>welcome.html</li>-->
<!--            </ul>-->
<!--        </li>-->
<!--    </ul>-->

    <ul class="easyui-tree">
        <li>
            <span><?= Html::a('栏目管理', ['cate/list']) ?></span>
        </li>
    </ul>

</div>