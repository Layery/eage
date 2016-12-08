<?php

namespace frontend\controllers;
use common\extensions\Curl;
use frontend\models\Article;
use Yii;
use yii\base\InvalidParamException;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionDetail()
    {
        if (IS_AJAX) {
            $id = Yii::$app->getRequest()->post('id');
            $result = Article::model()->getDetail($id);
            echo json_encode($result);
        }
    }

}
