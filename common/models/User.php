<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%b_user}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $username
 * @property string $password
 * @property integer $type
 * @property integer $created_time
 * @property integer $updated_time
 * @property integer $status
 * @property string $login_ip
 * @property integer $login_time
 * @property integer $login_count
 * @property integer $update_password
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%b_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'type', 'created_time', 'updated_time', 'status', 'login_time', 'login_count', 'update_password'], 'integer'],
            [['username', 'password', 'created_time', 'updated_time', 'login_ip', 'login_time'], 'required'],
            [['username', 'password'], 'string', 'max' => 70],
            [['login_ip'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'username' => 'Username',
            'password' => 'Password',
            'type' => 'Type',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'status' => 'Status',
            'login_ip' => 'Login Ip',
            'login_time' => 'Login Time',
            'login_count' => 'Login Count',
            'update_password' => 'Update Password',
        ];
    }

    /**
     * @return bool
     */
    public function setPassword()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function generateAuthKey()
    {
        return true;
    }

}
