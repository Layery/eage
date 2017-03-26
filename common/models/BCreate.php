<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%b_create}}".
 *
 * @property string $id
 * @property string $name
 * @property integer $age
 * @property integer $sex
 * @property string $address
 * @property string $mobile
 * @property integer $create_at
 * @property integer $update_at
 */
class BCreate extends \yii\db\ActiveRecord
{
    const CREATE_TEST = 'createTest';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b_create}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'age', 'sex', 'address', 'mobile', 'create_at', 'update_at'], 'required', 'on' => self::CREATE_TEST, 'message' => "{attribute}不能为空"],
            [['age', 'sex', 'create_at', 'update_at'], 'integer'],
            [['name'], 'string', 'length' => [2, 6], 'encoding' => 'utf-8', 'tooLong' => "{attribute}最长不超过4个字", 'tooShort' =>"{attribute}至少两个字"],
            [['address'], 'string', 'max' => 30],
            [['mobile'], 'string', 'length' => 11, 'notEqual' => "{attribute}格式错误"],
            [['mobile'], 'unique', 'message' => "{attribute}:{value}已经存在"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'age' => '年龄',
            'sex' => '性别',
            'address' => '住址',
            'mobile' => '手机号',
            'create_at' => '创建时间',
            'update_at' => '上次维护时间',
        ];
    }
}
