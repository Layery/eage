<?php

namespace frontend\controllers;
use admin\models\Base;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use frontend\models\PArticle;
use yii\data\ArrayDataProvider;

class ArticleController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionDetail()
    {
        if (IS_AJAX) {
            $id = Yii::$app->getRequest()->post('id');
            $result = (new PArticle())->getDetail($id);
            echo json_encode($result);
        }
    }

    public function actionList()
    {
        $rs = (new PArticle())->getList();
        return $this->render('list', ['data' => $rs]);
    }

}
