<?php
/**
 * Created by PhpStorm.
 * Date: 2016/12/13
 * Time: 16:25
 */

namespace common\models;

use yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Json;
use yii\data\Pagination;

class Base extends ActiveRecord
{
    public $table = NULL;

    protected $model;

    public function __construct()
    {

    }

    public function getList()
    {
        $data = self::find()->select('*');
        $page = new Pagination([
            'totalCount' => $data->count(),
            'pageSize' => isset($_POST['rows']) ? $_POST['rows'] : 10
        ]);
        $rs = $data->offset($page->offset)->limit($page->limit)->asArray()->all();
        return $rs;
    }

    public function create(Array $data = []) {
        if ($this->setAttributes($data)) {
            $error = $this->getErrors();
            return $error;
        }
        $this->save();
        return json_encode(['code' => 0 , 'msg' => 'ok']);
    }

    /**
     *
     * @param Query $query
     */
    public function detail(Query $query)
    {
        self::find()->where($query);
    }

}