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
        if (IS_AJAX) {
            p($_POST);
            $rs = (new Cate())->getList();
            echo json_encode($rs);
        }
        return $this->render('list');
    }


}