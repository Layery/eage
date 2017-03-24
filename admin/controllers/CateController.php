<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2016/12/12
 * Time: 23:49
 */

namespace admin\controllers;

use yii;
use common\models\Cate;

class CateController extends BaseController
{
    // 配置关闭csrf验证
    //public $enableCsrfValidation = false;
    private  $model;

    public function actionList()
    {
        if (IS_AJAX) {
            $params = !empty($_POST) ? $_POST : [];
            p($this->model);
            $result = $this->model->dataList($params);
            return $this->autoReturn($result, false);
        }
        return $this->render('list');
    }

    public function actionCreate() {
        if (IS_POST) {
            $data = [
                'name' => yii::$app->request->post('name'),
                'introduce' => yii::$app->request->post('introduce'),
                'parent_id' => yii::$app->request->post('parent_id'),
                'dateline' => intval(time())
            ];
            $cate = new PCate();
            $result = $cate->create($data);
            return $result;
        }

        return $this->render('_add',['data' => '']);
    }

}