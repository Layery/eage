<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2016/12/12
 * Time: 23:49
 */

namespace admin\controllers;

use yii;
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

    public function actionCreate() {
        if (IS_POST) {
            $data = [
                'name' => yii::$app->request->post('name'),
                'introduce' => yii::$app->request->post('introduce'),
                'parent_id' => yii::$app->request->post('parent_id'),
                'dateline' => time()
            ];
            $cate = new Cate();
            $result = $cate->create($data);
            p($result);
        }

        return $this->render('_add',['data' => '']);
    }

}