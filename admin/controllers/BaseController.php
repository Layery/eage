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
use yii;
use yii\web\Controller;
use yii\base\Action;
use common\models\Auth;
use common\models\User;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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

    public function behaviors()
    {
        return [];
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'signUp', 'logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
                ],
            ],
        ];
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

   /* public function beforeAction($action)
    {
        parent::beforeAction($action);
        $uid = 9;
        if ($uid == 9) return true;
        $status = yii::$app->right->checkUserAuth($uid, $this, $action);
        if ($status === false) {
            echo CommonUtil::authErrorMsg();
            $this->goBack();
        }
        return true;
    }*/
}
