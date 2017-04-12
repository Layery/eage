<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/26
 * Time: 16:53
 */
namespace admin\controllers;

use yii;
use common\models\Auth;
use common\util\CommonUtil;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use \ReflectionClass;

class AuthController extends BaseController
{

    /**
     * 权限列表
     *
     * @return string
     */
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Auth::find(),
            'pagination' => [
                'pageSize' => 10
            ]
        ]);
        return $this->render('list', ['dataProvider' => $dataProvider]);
    }

    /**
     * 创建权限
     *
     * @return string
     */
    public function actionCreate()
    {
        if (!empty(yii::$app->request->post())) {
            $params = [
                'name' => CommonUtil::post('name'),
                'status' => CommonUtil::post('status'),
                'actions' => json_encode(CommonUtil::post('actions')),
                'uid' => 1,
                'created_at' => time(),
                'updated_at' => time()
            ];
            $rs = (new Auth())->AuthCreate($params);
        }
        return $this->render('_add', [
            'authModel' => new Auth(),
            'authAction' => yii::$app->right
        ]);
    }

    /**
     * Rbac创建权限
     *
     */
    public function actionPermissionCreate()
    {   
        $name = CommonUtil::post('permissionName');
        $auth = Yii::$app->authManager;    
        $createPost = $auth->createPermission($name);    
        $createPost->description = '创建了 ' . $name. ' 权限';    
        $auth->add($createPost);
    }

    public function actionTest()
    {
        $reflectionObject = new ReflectionClass($this);
        $controllerId = yii::$app->controller->id;
        $methodList = $reflectionObject->getMethods(\ReflectionMethod::IS_PUBLIC);
        $methodArray = [];
        foreach ($methodList as $v) {
            if ($v->class == $reflectionObject->name) {
                $methodArray[] = $controllerId. '/'. str_replace('action', '', $v->name);
            }
        }
        return $this->renderContent('rbactest');
    }
}