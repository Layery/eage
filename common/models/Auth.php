<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%b_auth}}".
 *
 * @property integer $Id
 * @property string $name
 * @property integer $actions
 * @property integer $uid
 * @property integer $create_at
 * @property integer $update_at
 */
class Auth extends \common\models\base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b_auth}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['actions', 'uid', 'create_at', 'update_at'], 'integer'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'name' => '角色名称',
            'actions' => '权限范围',
            'uid' => '操作人',
            'create_at' => '创建时间',
            'update_at' => '维护时间',
        ];
    }

    public function test()
    {

    }

}
