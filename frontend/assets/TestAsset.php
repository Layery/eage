<?php 
namespace frontend\assets;

use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
    ];
    public $js = [
//        'js/controllers/site-index.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    /**
     * 定义按需加载js方法
     *
     * @param $view
     * @param $jsFile
     */
    public static function addJs($view, $jsFile)
    {
        $view->registerJsFile($jsFile, [TestAsset::className(), 'depends' => 'frontend\assets\TestAsset']);
    }
}