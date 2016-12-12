<?php

namespace admin\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/themes/default/easyui.css',
        '/themes/icon.css',
        '/themes/demo.css'
    ];
    public $js = [
        'js/easyui/jquery.min.js',
        'js/easyui/jquery.easyui.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
