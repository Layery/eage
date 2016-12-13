<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2016/12/11
 * Time: 14:51
 */

namespace admin\controllers;
use yii;
use yii\web\Controller;
use yii\base\Action;
use admin\models\Base;
class BaseController extends Controller
{
    public $js = [];
    public $css = [];
    public $controller;
    public $action;
    private $model;
    public $tableName;
    // 初始化引入所有的js , css文件
    public function init()
    {
        $this->layout = 'admin';
        $this->js = [
            [JS_URL . 'jquery-ui-1.10.3.custom.min.js'],
            [JS_URL . 'jquery.ui.touch-punch.min.js'],
            [JS_URL . 'jquery.slimscroll.min.js'],
            [JS_URL . 'jquery.easy-pie-chart.min.js'],
            [JS_URL . 'jquery.sparkline.min.js'],
            [JS_URL . 'flot/jquery.flot.min.js'],
            [JS_URL . 'flot/jquery.flot.pie.min.js'],
            [JS_URL . 'flot/jquery.flot.resize.min.js']
        ];
        $this->model = new Base();
    }

    public function beforeAction( $action)
    {
        $this->controller = ucfirst(strtolower(Yii::$app->controller->id));
        $this->action = Yii::$app->controller->action->id;

        return parent::beforeAction($action);
    }


    public function actionList()
    {

        $rs = (new $this->controller())->getList();
        return $this->render('list', ['data' => $rs]);
    }

}