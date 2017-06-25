<?php
/**
 * Created by Sublime
 * @authors layery
 * @date    2017-04-11 21:59:03
 */
namespace admin\controllers;

use admin\controllers\BaseController;
use common\util\CommonUtil;

class PracticeController extends BaseController {

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
        p($post);
    }
}