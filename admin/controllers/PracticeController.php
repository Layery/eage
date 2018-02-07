<?php
/**
 * Created by Sublime
 * @authors layery
 * @date    2017-04-11 21:59:03
 */
namespace admin\controllers;

use admin\controllers\BaseController;
use common\util\CommonUtil;
use yii\filters\Cors;

class PracticeController extends BaseController {

    // 配置关闭csrf验证
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $result = json_encode(['status' => 1, 'data' => [['aa', 'bb', 'cc'], ['aaa', 'bbb', 'ccc']]]);
        $jsonpCallBack = CommonUtil::get('callback');
        $rs = $jsonpCallBack. "(". $result. ")";
        exit($rs);
    }

    public function actionIframe()
    {
        return $this->render('iframe');
    }

    public function actionUpload()
    {
        if (!$_POST) {
            return $this->render('h5ajaxupload');
        }
        $post = CommonUtil::post();
        return $this->render('h5ajaxupload');
    }

    public function actionForm()
    {
        
        return $this->render('form');
    }
}