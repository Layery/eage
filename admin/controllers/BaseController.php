<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2016/12/11
 * Time: 14:51
 */

namespace admin\controllers;
use admin\assets\AppAsset;
use common\models\Article;
use common\util\CommonUtil;
use SebastianBergmann\Comparator\ExceptionComparatorTest;
use yii;
use yii\web\Controller;
use yii\base\Action;
use common\models\Auth;
use common\models\User;

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
//        $this->layout = 'admin';
        $this->layout = 'amaze';
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

    public function beforeAction($action){
        parent::beforeAction($action);
        $uid =
        $uid = 8;  // 编辑

        $status = yii::$app->right->checkUserAuth($uid, $this, $action);
        if ($status === false) {
            echo CommonUtil::authErrorMsg();
            $this->goBack();
        }
        return true;
    }

    public function actionTest(){
        $this->beforeAction();
    }
}
