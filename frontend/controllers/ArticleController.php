<?php

namespace frontend\controllers;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use frontend\models\Article;
use yii\data\ArrayDataProvider;

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
