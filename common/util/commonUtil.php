<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/26
 * Time: 13:53
 */
namespace common\util;

use yii;

class CommonUtil
{
    public static function post($params = NULL, $type = NULL, $default = '')
    {
        $post = yii::$app->request->post();
        if (empty($params)) return $post;
        $data = yii::$app->request->post($params);
        if (!is_array($data)) {
            switch ($type) {
                case 'int':
                    $data = intval($data);
                    break;
                case 'string':
                    $data = (string) $data;
                    break;
                case 'float':
                    $data = floatval($data);
                    break;
                default:
                    $data = $data;
            }
        }
        return $data;
    }
}