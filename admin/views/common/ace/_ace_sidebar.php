<?php
use yii\helpers\Url;

?>
<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div>
    <!-- #sidebar-shortcuts -->
    <ul class="nav nav-list">
        <li class="active">
            <a href="javascript:;">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> Welcome </span>
            </a>
        </li>

        <li>
            <a href="<?= Url::toRoute('user/list') ?>">
                <i class="icon-text-width"></i>
                <span class="menu-text"> 用户列表 </span>
            </a>
        </li>
        <li class="active">
            <a href="#" class="dropdown-toggle">
                <i class="icon-desktop"></i>
                <span class="menu-text"> 权限管理 </span>
                <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?= Url::toRoute(['auth/create']) ?>">
                        <i class="icon-double-angle-right"></i>
                        节点管理
                    </a>
                </li>
                <li>
                    <a href="<?= Url::toRoute('auth/list') ?>">
                        <i class="icon-double-angle-right"></i>
                        角色列表
                    </a>
                </li>
            </ul>
        </li>
         <li class="active">
            <a href="#" class="dropdown-toggle">
                <i class="icon-desktop"></i>
                <span class="menu-text"> 练习测试 </span>
                <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?= Url::toRoute(['practice/upload']) ?>">
                        <i class="icon-double-angle-right"></i>
                        H5上传
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    <!-- #sidebar-shortcuts -->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>