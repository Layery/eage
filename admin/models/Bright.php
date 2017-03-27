<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/27
 * Time: 11:39
 */
namespace admin\models;

use yii;
use common\models\User;
use common\models\Auth;
use common\util\CommonUtil;
use yii\base\Model;

class Bright extends Model
{
    public $data;

    public $allowMap = [
        'site/index'
    ];

    public function init()
    {
        parent::init();
        $this->loadAuthOptions();
    }

    public function loadAuthOptions()
    {
        if (empty($this->data)) {
            $actionFile = yii::$app->getBasePath(). DIRECTORY_SEPARATOR. 'config'. DIRECTORY_SEPARATOR. 'right.php';
            if (!file_exists($actionFile)) {
                return false;
            }
            $this->data = require_once($actionFile);
        }
        return $this->data;
    }

    public function authCode2Name($params)
    {
        if (empty($this->data) || !$params) return false;
        $params = json_decode($params, true);
        $str = '';
        foreach ($params as $controller => $crow) {
            foreach ($crow as $action) {
                $str .= $this->data[$controller]['option'][$action]['label'] . ',';
            }
            $str = rtrim($str, ',') . '|';
        }
        return rtrim($str, '|');
    }

    /**
     * 校验用户操作权限
     *
     * @param $uid
     * @param $controller
     * @param $action
     * @return bool
     */
    public function checkUserAuth($uid,$controller,$action)
    {
        $actions = json_decode(Auth::findOne(User::findOne($uid)->role)->actions, true);
        $roteUrl = $controller->id. '/' . $action->id;
        if (in_array($roteUrl, $this->allowMap)) {
            return true;
        }
        if (!array_key_exists($controller->id, $actions)) {
            return false;
        }
        if (!in_array($action->id, $actions[$controller->id])) {
            return false;
        }
        return true;
    }
}