<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/25
 * Time: 17:31
 */
use yii\helpers\Url;
?>

<div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
        <ul class="am-list admin-sidebar-list">
            <li><a href=""><span class="am-icon-table"></span></a></li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-nav-system'}"><span class="am-icon-file"></span> 系统设置<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-system">
                    <li><a href="<?= Url::toRoute('user/detail')?>" class="am-cf"><span class="am-icon-check"></span> 个人资料<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                    <li><a href="<?= Url::toRoute('system/log') ?>"><span class="am-icon-calendar"></span> 系统日志</a></li>
                    <li><a href="<?= Url::toRoute('system/error404') ?>"><span class="am-icon-bug"></span> 404</a></li>
                </ul>

            </li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-nav-blog'}"><span class="am-icon-file"></span> 博文管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-blog">
                    <li><a href="<?= Url::toRoute('cate/list') ?>" class="am-cf"><span class="am-icon-check"></span> 栏目管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                    <li><a href="<?= Url::toRoute('article/list') ?>"><span class="am-icon-file"></span> 文章管理</a></li>
                </ul>
            </li>
            <li class="admin-parent">
                <a class="am-cf" data-am-collapse="{target: '#collapse-nav-user'}"><span class="am-icon-file"></span> 用户管理<span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav-user">
                    <li><a href="<?= Url::toRoute('auth/list') ?>" class="am-cf"><span class="am-icon-check"></span> 权限列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                    <li><a href="<?= Url::toRoute('role/list') ?>" class="am-cf"><span class="am-icon-check"></span> 角色列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                    <li><a href="<?= Url::toRoute('user/list') ?>"><span class="am-icon-file"></span> 用户列表</a></li>
                </ul>
            </li>
           <!-- <li><a href="admin-table.html"><span class="am-icon-table"></span> 表格</a></li>
            <li><a href="admin-form.html"><span class="am-icon-pencil-square-o"></span> 表单</a></li>
            <li><a href="#"><span class="am-icon-sign-out"></span> 注销</a></li>-->
        </ul>

       <!-- <div class="am-panel am-panel-default admin-sidebar-panel">
            <div class="am-panel-bd">
                <p><span class="am-icon-bookmark"></span> 公告</p>
                <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
            </div>
        </div>

        <div class="am-panel am-panel-default admin-sidebar-panel">
            <div class="am-panel-bd">
                <p><span class="am-icon-tag"></span> wiki</p>
                <p>Welcome to the Amaze UI wiki!</p>
            </div>
        </div>-->
    </div>
</div>
