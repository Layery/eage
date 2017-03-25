<?php

namespace admin\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css\amaze\amazeui.min.css',
        'css\amaze\admin.css',
    ];
    public $js = [
        'js\amaze\amazeui.min.js',
        'js\amaze\app.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    // 这是设置所有js放置的位置, 此参数指定js资源在文件开头开始引入
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];


    //定义按需加载JS方法，注意加载顺序在最后
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'admin\assets\AppAsset']);
    }
}







