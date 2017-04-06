<?php
namespace console\controllers;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        // 添加 "create" 权限
        $create = $auth->createPermission('create');
        $create->description = '新增';
        $auth->add($create);

        // 添加 "editor" 角色并赋予 "create" 权限
        $editor = $auth->createRole('editor');
        $auth->add($editor);
        $auth->addChild($editor, $create);

        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($editor, 17);  // id为17的用户指派为editor角色
    }



    public function actionTest()
    {
        $auth = yii::$app->authManager;
        $role = $auth->getRole('editor');
        if ($auth->assign($role, 17))
            echo 'ok';
        else
            echo 'false';
    }

}