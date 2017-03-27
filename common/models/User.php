<?php

namespace common\models;

use yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User
 * @package common\models
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @var user
     */
    private static $_user;
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

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
            [['created_at', 'updated_at'], 'default', 'value' => time()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => '邮箱',
            'status' => '状态',
            'role' => '角色',
            'created_at' => '创建时间',
            'updated_at' => '维护时间',
        ];
    }

    /**
     * set user password
     *
     * @param $password
     */
    public function setPassword($password)
    {
        if (!empty($password)) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($password);
        }
    }

    /**
     * set remember
     *
     * @return bool
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @param $userName
     * @return array|User|null|ActiveRecord
     */
    public static function findByUsername($userName)
    {
        if (self::$_user = User::find()->where(['username' => $userName])->one()) {
            return self::$_user;
        }
    }

    public function validatePassword()
    {
        return true;
    }

    public function dataList()
    {
        return self::find()->asArray()->all();
    }

    public static function model()
    {
        return new self();
    }
}
