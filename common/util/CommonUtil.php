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
    public static function authErrorMsg()
    {
        $jsScript = "";
        $jsScript .= "<script>alert('对不起,您没有权限');</script>";
        return $jsScript;
    }

    public static function post($param = NULL, $type = 'string')
    {
        $post = self::commonAddSlashes($_POST);
        if (!isset($param)) return $post;
        $result = $post[$param];
        return self::convert($result, $type);
    }

    public static function get($param = NULL, $type = 'string')
    {
        $get = $_GET;
        if (empty($param)) return $get;
        $result = $get[$param];
        return self::convert($result, $type);
    }

    public static function convert($data, $type = 'string')
    {
        if ($data == NULL) return NULL;
        switch ($type) {
            case 'int':
                $result = intval($data);
                break;
            case 'float':
                $result = floatval($data);
                break;
            case 'bool':
                $result = (bool)$data;
                break;
            default:
                $result = strval($data);
                break;
        }
        return $result;
    }

    public static function commonAddSlashes($data = '')
    {
        $result = NULL;
        if (is_string($data)) {
            $result = addslashes($data);
        } else if (is_array($data)) {
            foreach ($data as $key => $val) {
                $result[$key] = self::commonAddSlashes($val);
            }
        }
        return $result;
    }

}










