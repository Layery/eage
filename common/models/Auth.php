<?php

namespace common\models;

use Yii;
use common\util\CommonUtil;
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
class Auth extends \yii\rbac\DbManager
{
    public $itemTable = '{{%b_item}}';
    /**
     * @var string the name of the table storing authorization item hierarchy. Defaults to "auth_item_child".
     */
    public $itemChildTable = '{{%b_item_child}}';
    /**
     * @var string the name of the table storing authorization item assignments. Defaults to "auth_assignment".
     */
    public $assignmentTable = '{{%b_assignment}}';
    /**
     * @var string the name of the table storing rules. Defaults to "auth_rule".
     */
    public $ruleTable = '{{%b_rule}}';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','description',], 'required'],
            [['name'], 'string'],
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


    /**
     * 创建权限节点
     *
     * @param $params
     * @return array|bool
     */
    public function createPermissions($params)
    {
        $error = [];
        if (!$params['controllerId'] || !$params['actionId']) {
            $error[] = '权限节点不允许为空';
        }
        extract($params); // 切割关联数组
        $permissionString = strtolower(trim($controllerId. '/' . $actionId));
        if ($this->getPermission($permissionString)) {
            $error[] = '此权限节点已经存在';
        }
        if (empty($error)) {
            $permission = $this->createPermission($permissionString);
            $permission->description = CommonUtil::post('actionIntro');
            $this->add($permission);
            return true;
        }
        return $error;
    }

    /**
     * 获取角色列表
     *
     * @param array $params
     * @return null|\yii\rbac\Item|\yii\rbac\Item[]|\yii\rbac\Role|\yii\rbac\Role[]
     */
    public function getRoleList($params = [])
    {
        if (!empty($params)) {
            return $this->getRole($params['name']);
        }
        return $this->getRoles();
    }
}
