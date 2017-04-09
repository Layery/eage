<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%b_auth}}".
 *
 * @property string $id
 * @property string $name
 * @property integer $status
 * @property string $actions
 * @property integer $uid
 * @property integer $created_at
 * @property integer $updated_at
 */
class Auth extends \common\models\Base
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
            [['status', 'actions', 'name',], 'required'],
            [['status', 'execute_id', 'created_at', 'updated_at'], 'integer'],
            [['actions'], 'string'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '角色名称',
            'status' => '状态',
            'actions' => '权限范围',
            'execute_id' => '操作人',
            'created_at' => '创建时间',
            'updated_at' => '维护时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\query\AuthQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\query\AuthQuery(get_called_class());
    }

    public function AuthCreate($params)
    {
        $this->setAttributes($params);
        if ($this->save()) {
            return true;
        } else {
            $errors = $this->getErrors();
            p($errors);
        }
    }

}
