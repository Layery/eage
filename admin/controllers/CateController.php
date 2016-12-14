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
    // 配置关闭csrf验证
    public $enableCsrfValidation = false;

    public function init()
    {
        parent::init();
    }

    public function actionList()
    {
        if (IS_AJAX) {
            $rs = (new Cate())->getList();
            return json_encode($rs);
        }
        return $this->render('list');
    }


}