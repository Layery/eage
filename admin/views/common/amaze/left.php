<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;


?>
<div data-options="region:'west',split:true,title:'系统菜单'" style="width:150px;padding:10px;">
    <ul id="tt" class="easyui-tree" data-options="animate:true">
        <li>
            <span>博客管理</span>
            <ul>
                <li>
                    <span ><?= Html::a('CateManage', ['cate/list']) ?></span>
                </li>
                <li>
                    <span ><?= Html::a('ArticleManage', ['article/list']) ?></span>
                </li>
            </ul>
        </li>
        <li>
            <span>系统管理</span>
            <ul>
                <li>
                    <span><?= Html::a('配置列表', ['system/list']) ?></span>
                </li>
                <li>
                    <span><?= Html::a('会员管理', ['user/list']) ?></span>
                </li>
            </ul>
        </li>
    </ul>
</div>