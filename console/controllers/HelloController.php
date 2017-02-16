<?php
namespace console\controllers;

use yii\console\Controller;
class HelloController extends Controller 
{
    public function actionIndex()
    {
        echo 'console和web应用一样, 不同的是console应用需要引用框架中console下的controller';
    }

    public function actionNow()
    {
        echo date('Y-m-d H:m:s', time());
    }
}