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
        $search = !empty($_POST) ? $_POST : [];
        $rs = $this->model->dataList($search);
        if (IS_AJAX) {
            return $this->autoReturn($rs, false);
        }
        return $this->render('list');
    }

    public function actionCreate()
    {

        if (!empty($data = $_POST)) {
			$params = [
			    'name' => $data['name'],
                'cate_id' => (int) $data['cate_id'],
                'post' => $data['ueditor'],
                'dateline' => time()
            ];
            $rs = (new Article())->articleCreate($params);
            return $rs;
        }
        return $this->render('_add');
    }
}
