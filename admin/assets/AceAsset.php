<?php

namespace admin\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AceAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css\ace\css\ace.min.css',
        'css\ace\css\font-awesome.min.css',
        'css\ace\css\ace-rtl.min.css',
        'css\ace\css\ace-skins.min.css',
        'css\ace\css\ace-fonts.css',

    ];
    public $js = [
        'js\ace\js\bootstrap.min.js',
        'js\ace\js\ace-elements.min.js',
        'js\ace\js\ace-extra.min.js',
        'js\ace\js\ace.min.js',
        'js\ace\js\typeahead-bs2.min.js',
        'js\ace\js\jquery.dataTables.min.js',
        'js\ace\js\jquery.dataTables.bootstrap.js',
        // 'js\ace\js\jquery.slimscroll.min.js',
        // 'js\ace\js\jquery-ui-1.10.3.custom.min.js',
        // 'js\ace\js\jquery.ui.touch-punch.min.js',
        // 'js\ace\js\jquery.easy-pie-chart.min.js',
        // 'js\ace\js\jquery.sparkline.min.js',
        // 'js\ace\js\flot\jquery.flot.min.js',
        // 'js\ace\js\flot\jquery.flot.pie.min.js',
        // 'js\ace\js\flot\jquery.flot.resize.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    // 这是设置所有js放置的位置, 此参数指定js资源在文件开头开始引入
    public $jsOptions = [
        'position' => View::POS_HEAD
    ];


    //定义按需加载JS方法，注意加载顺序在最后
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'admin\assets\AppAsset']);
    }

    /**
     * 定义按需加载css文件
     *
     * @param $view
     * @param $cssFile
     */
    public static function addCss($view, $cssFile) {
        $view->registerCssFile($cssFile, [AppAsset::className(), 'depends' => 'admin\assets\AppAsset']);
    }
}







