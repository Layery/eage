<?php
/**
 * Created by PhpStorm.
 * User: liulongfei
 * Date: 2017/4/7
 * Time: 20:03
 */
namespace admin\controllers;

use yii;
use common\models\LoginForm;
use yii\web\Controller;
use common\util\CommonUtil;

class DefaultController extends Controller
{
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if (Yii::$app->request->post()) {
            $model->password = CommonUtil::post('password');
            $model->email = CommonUtil::post('email');
            if ($model->login()) {
                return $this->goBack();
            } else {
                return $this->renderPartial('login', [
                    'model' => $model,
                    'status' => 1   // 是否登录过, 为0时代表没有登录过
                ]);
            }
        }
        return $this->renderPartial('login', ['model' => $model, 'status' => 0]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goBack(['default/login']);
    }

}