<?php
/**
 * Created by PhpStorm.
 * Date: 2016/12/13
 * Time: 16:25
 */

namespace admin\models;

use yii\base\Model;

class Base extends Model
{
    public function getList($controller , $action)
    {
        return $this;
    }
}