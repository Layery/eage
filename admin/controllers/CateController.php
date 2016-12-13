<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2016/12/12
 * Time: 23:49
 */

namespace admin\controllers;
use admin\models\Cate;

class CateController extends BaseController
{
    public function init()
    {
        parent::init();
    }

    public function actionList()
    {
        $rs = (new Cate())->getList();
        return $this->render('list', ['data' => $rs]);
    }


}