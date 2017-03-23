<?php
/**
 * Created by PhpStorm.
 * Date: 2016/12/13
 * Time: 16:25
 */

namespace common\models;

use common\query\cateQuery;
use yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Json;
use yii\data\Pagination;

class Base extends ActiveRecord
{

    public static function find()
    {
        $classPath = explode('\\', get_called_class());
        $classQuery = COMMON. DIRECTORY_SEPARATOR. 'query'. DIRECTORY_SEPARATOR. strtolower(end($classPath)).'Query.php';
        if (file_exists($classQuery)) {
            try {
                $class = basename($classQuery, '.php');
//                return new $class();
                return new \common\query\cateQuery(get_called_class());
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            throw new \Exception("文件不存在");
        }
    }

//
//    public function getList()
//    {
//        $data = self::find()->select('*');
//        $page = new Pagination([
//            'totalCount' => $data->count(),
//            'pageSize' => isset($_POST['rows']) ? $_POST['rows'] : 10
//        ]);
//        $rs = $data->offset($page->offset)->limit($page->limit)->asArray()->all();
//        return $rs;
//    }

//    public function create(Array $data = []) {
//        $class = get_called_class();
//        $model = new $class();
//        if ($model->setAttributes($data)) {
//            p('aaa');
//        } else {
//            p($model);
//        }
//
//    }



}