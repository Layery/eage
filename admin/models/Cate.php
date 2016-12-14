<?php

namespace admin\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "b_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $introduce
 * @property string $parent_id
 * @property string $dateline
 */
class Cate extends Base
{

    public function __construct()
    {
        $this->table = self::tableName();
    }

    public static function tableName()
    {
        return '{{%b_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'dateline'], 'integer'],
            [['name', 'introduce'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'introduce' => '栏目简介',
            'parent_id' => '上级栏目',
            'dateline' => '添加时间',
        ];
    }

}
