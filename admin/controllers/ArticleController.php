<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2016/12/12
 * Time: 23:49
 */

namespace admin\controllers;
use admin\models\Article;

class ArticleController extends BaseController
{
    public function init()
    {
        parent::init();
    }


    public function actionList()
    {
        $rs = (new Article())->getList();
        return $this->render('list', ['data' => $rs]);
    }

}