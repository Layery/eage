<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Article;
use Yii\web\Controller;

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
