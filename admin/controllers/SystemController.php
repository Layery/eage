<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/27
 * Time: 22:02
 */
namespace admin\controllers;


class SystemController extends BaseController
{

    public function actionError404()
    {
        return $this->renderContent('404页面');
    }

    public function actionLog()
    {
        return $this->renderContent('系统日志');
    }
}