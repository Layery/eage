<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/27
 * Time: 11:39
 */
namespace admin\models;

use yii;
use yii\base\Model;

class Bright extends Model
{
    public $data;

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
}