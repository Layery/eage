<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fy_admin".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $wx_openid
 * @property string $wx_last_send
 * @property string $wx_last_receive
 * @property string $password
 * @property integer $department
 * @property string $last_login
 * @property string $last_ip
 * @property string $province
 * @property string $city
 * @property string $district
 * @property string $role
 * @property string $dateline
 * @property string $manage_region
 * @property string $area
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fy_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'last_login', 'dateline', 'manage_region', 'area'], 'required'],
            [['id', 'wx_last_send', 'wx_last_receive', 'department', 'last_login', 'province', 'city', 'district', 'dateline'], 'integer'],
            [['manage_region'], 'string'],
            [['name', 'email', 'wx_openid', 'role', 'area'], 'string', 'max' => 100],
            [['mobile'], 'string', 'max' => 11],
            [['password'], 'string', 'max' => 32],
            [['last_ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '管理员姓名',
            'email' => '邮箱',
            'mobile' => '手机',
            'wx_openid' => '微信openid',
            'wx_last_send' => '最后一次发送微信消息时间',
            'wx_last_receive' => '最后一次收到微信消息时间',
            'password' => '密码,md5加密',
            'department' => '部门ID',
            'last_login' => '最后一次登录时间',
            'last_ip' => '最后登陆IP',
            'province' => '省',
            'city' => '市',
            'district' => '区',
            'role' => '角色ID,逗号分隔',
            'dateline' => 'Dateline',
            'manage_region' => '管理区域,多值竖线分割',
            'area' => '大区Id存放',
        ];
    }
}
