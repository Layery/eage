<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2016/12/12
 * Time: 23:49
 */

namespace admin\controllers;
use common\models\Article;
use yii;

class ArticleController extends BaseController
{
    public $enableCsrfValidation = false;
    public $js = [];
    public function init()
    {
        parent::init();
    }

    public function beforeRender()
    {

    }
    public function actionList()
    {
        $data = (new Article())->getList();
        return $this->render('list', ['data' => $data]);
    }

    public function actionCreate()
    {
        if (IS_POST && !empty($data = $_POST)) {
			$params = [
			    'name' => $data['name'],
                'cateId' => $data['cate_id'],
                'post' => $data['ueditor'],
                'dateline' => time()
            ];
            $rs = (new Article())->create($params);
            echo $this->autoReturn($rs);
        }
        return $this->render('_add');
    }
}
