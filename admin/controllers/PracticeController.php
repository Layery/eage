<?php
/**
 * Created by Sublime
 * @authors layery
 * @date    2017-04-11 21:59:03
 */
namespace admin\controllers;

use admin\controllers\BaseController;

class PracticeController extends BaseController {

    public function actionIframe()
    {
        return $this->render('iframe');
    }

}