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
//        'css/themes/default/easyui.css',
//        'css/themes/icon.css',
//        'css/themes/demo.css'
    ];
    public $js = [
//        'easyui/jquery.min.js',
//        'easyui/jquery.easyui.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
