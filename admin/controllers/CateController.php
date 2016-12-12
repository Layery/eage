<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2016/12/12
 * Time: 23:49
 */

namespace admin\controllers;

class CateController extends BaseController
{
    public function actionList()
    {
        return $this->render('list', ['name' => '栏目管理']);
    }
}