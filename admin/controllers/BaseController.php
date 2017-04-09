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
        $this->layout = 'amaze';
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'sigUp', 'logOut'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signUp'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
                'denyCallback' => function ($rule, $action) {
                    echo CommonUtil::authErrorMsg();
                }
            ]
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

    /**
     * 初始化action操作
     *
     * @param Action $action
     * @return string
     */
    public function beforeAction($action)
    {
        if (yii::$app->user->isGuest) {
            return yii::$app->user->loginRequired();
        }
        if (!parent::beforeAction($action)) {
            return false;
        }
        if (yii::$app->user->can($action->id)) {
            return 'aaa';
        } else {
            echo CommonUtil::authErrorMsg();
        }
    }


}
