<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2016/12/11
 * Time: 14:51
 */

namespace admin\controllers;
use admin\assets\AppAsset;
use common\models\Article;
use SebastianBergmann\Comparator\ExceptionComparatorTest;
use yii;
use yii\web\Controller;
use yii\base\Action;
use common\models\Base;
class BaseController extends Controller
{
    public $js = [];
    public $css = [];
    public $controller;
    public $action;
    public $tableName;
    // 初始化引入所有的js , css文件
    public function init()
    {
//        $this->layout = 'admin';
        $this->layout = 'amaze';
    }


    /**
     * 默认返回分页信息, $status设置为false只返回data
     *
     * @param $data
     * @param bool|true $status
     * @return bool|string
     */
    public function autoReturn($data, $status = true)
    {
        if (!is_array($data)) return false;
        if (!$status) {
            return json_encode($data['data']);
        }
        return json_encode($data);
    }
}
