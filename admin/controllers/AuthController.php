<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/26
 * Time: 16:53
 */
namespace admin\controllers;

use common\models\Auth;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

class AuthController extends BaseController
{


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

    public function actionCreate()
    {
        return $this->render('_add', [
            'authModel' => new Auth(),

        ]);
    }

}