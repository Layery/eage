<?php
namespace admin\controllers;

use app\index\model\Cate;
use common\models\User;
use common\util\CommonUtil;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use admin\controllers;
use common\models\LoginForm;
/**
 * Site controller
 */
class SiteController extends BaseController
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

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
        return $this->goBack(['site/login']);
    }


    public function actionError()
    {
        $exception = \Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }
}
