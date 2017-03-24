<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2016/12/11
 * Time: 14:51
 */

namespace admin\controllers;
use common\models\Article;
use SebastianBergmann\Comparator\ExceptionComparatorTest;
use yii;
use yii\web\Controller;
use yii\base\Action;
use common\models\Base;
class BaseController extends Controller
{
    public $js = [];
    public $css = [];
    public $controller;
    public $action;
    public $tableName;
    // 初始化引入所有的js , css文件
    public function init()
    {
        $this->layout = 'admin';
    }

    public function __get($name)
    {
        if ($name == 'model') {
            $controller = yii::$app->controller->id;
            return new $controller;
        } else {
            echo $name. 'undefined';
            return false;
        }
        // TODO: Implement __get() method.
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

    /**
     * 默认返回分页信息, $status设置为false只返回data
     *
     * @param $data
     * @param bool|true $status
     * @return bool|string
     */
    public function autoReturn($data, $status = true)
    {
        if (!is_array($data)) return false;
        if (!$status) {
            return json_encode($data['data']);
        }
        return json_encode($data);
    }
}
