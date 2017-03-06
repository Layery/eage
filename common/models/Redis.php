<?php

namespace common\models;

use Yii;
/**
 * @use redis 组件
 *
 * @author: 高高
 * @Date: 2016/6/16
 */
class Redis
{
    /**
     * @var array 存储多个redis实例对象,保持单例
     */
    private $_active = [];
    /**
     * @var string 当前具体哪个redis实例
     */
    private $_key;
    /**
     * @var object 当前的redis 对象
     */
    private $_redis;
    /**
     * @var string redis的函数名
     */
    private $_name;

    private $_notAllowFunction = [
        "migrate", "move", "object", "randomkey",
        "scan", "sscan", "hscan", "zscan", "psubscribe",
        "pubsub", "punsubscribe", "subscribe", "unsubscribe", "discard",
        "exec", "multi", "unwatch", "watch",

        "eval", "evalsha",  "auth", "echo", "ping","quit",
        "select", "bgrewriteaof", "bgsave", "dbsize", "flushall",
        "flushdb", "info", "lastsave", "monitor", "psync",
        "save", "shutdown", "slaveof", "slowlog", "sync",
        "time",

    ];

    private $_keyLocateIndex = [
        "bitop" => "2",
        "destination" => "1",
        "sinterstore" => "1",
        "sunionstore" => "1",
        "zunionstore" => "2",
        "zinterstore" => "2",
    ];

    /**
     * @use 根据键名获取redis所在redis配置
     *
     * @param redis中的键名 mixed (string or array)
     * @return string
     */
    private function setKey($key)
    {
        //key重新计算
        $this->_key = "";

        $keyInfo = is_array($key)?explode(":",$key[0]):explode(":",$key);
        $conf = Yii::$app->params['redis'];

        $keys = array_keys($conf);
        foreach ($keys as $tKey) {
            $prefixArray = explode(":",$tKey);
            if (in_array($keyInfo[0],$prefixArray)) {
                $this->_key = $tKey;
                break;
            }
        }
        !$this->_key && $this->_key = 'other';
    }

    /**
     * @use 获取redis函数具体哪个位置是键名
     *
     * @return int|mixed 键名在第几个参数中
     */
    private function getKeyLocateIndex()
    {
        $index = 0;
        if (isset($this->_keyLocateIndex[strtolower($this->_name)])) {
            $index = $this->_keyLocateIndex[strtolower($this->_name)];
        }

        return $index;
    }

    /**
     * @use  检测 redis的函数是否为禁用
     *
     * @param $name string redis 函数名
     * @param $arguments array 函数的参数
     * @return bool
     */
    private function checkAllowFunction($name, $arguments)
    {
        $name = strtolower($name);
        try {
            if ($name == 'keys') {//单独检测下 keys函数
                $pos = strpos($arguments[0],":");
                if ($pos===false || $pos==0) {
                    throw new CException ("keys函数不允许全部检索,参数必须包含':'");
                }
            } else {
                if (in_array($name,$this->_notAllowFunction)){
                    throw new CException ("Redis 此函数:{$name}禁止使用");
                } else {
                    $this->_name = $name;
                }
            }
        } catch (CException $e) {
            echo $e->getMessage();
        }
        return true;
    }

    /**
     * @use 根据键名获取具体连接哪个redis
     *
     * @param $key string 键名
     * @throws CException
     */
    private function connect_bak($key)
    {
        $this->setKey($key);
        if ($this->_active[$this->_key]) {
            $this->_redis = $this->_active[$this->_key];
        } else {
            $conf = Yii::$app->params['redis'][$this->_key];
            $redis = new Redis();
            $conf['timeout'] = isset($conf['timeout']) ? $conf['timeout'] : 10;
            if (isset($conf['pconnect'])) {
                $flag = $redis->pconnect($conf['host'],$conf['port'],$conf['timeout']);
            } else {
                $flag = $redis->connect($conf['host'],$conf['port'],$conf['timeout']);
            }
            if (isset($conf['auth'])) {
                $redis->auth($conf['auth']);
            }
            if (!$flag) {
                throw new CException('redis connect failed');
            } else {
                isset($conf['database']) && $redis->select($conf['database']);
                $this->_redis = $this->_active[$this->_key] = $redis;
            }

        }

    }

    private function connect($key)
    {
        $this->setKey($key);
        $conf = Yii::$app->params['redis'][$this->_key];
        $redis = new \Redis();
        $conf['timeout'] = isset($conf['timeout']) ? $conf['timeout'] : 10;
        if (isset($conf['pconnect'])) {
            $flag = $redis->pconnect($conf['host'],$conf['port'],$conf['timeout']);
        } else {
            $flag = $redis->connect($conf['host'],$conf['port'],$conf['timeout']);
        }
        if (isset($conf['auth'])) {
            $redis->auth($conf['auth']);
        }
        if (!$flag) {
            throw new CException('redis connect failed');
        } else {
            isset($conf['database']) && $redis->select($conf['database']);
            $this->_redis = $this->_active[$this->_key] = $redis;
        }
    }

    /**
     * @use php 魔术方法 自动调用 redis中的函数
     *
     * @param string $name  函数名
     * @param array $arguments  给函数传的参数
     * @return bool
     * @throws CException
     */
    public function __call($name, $arguments)
    {
        if ($this->checkAllowFunction($name, $arguments)) {
            $key = $arguments[$this->getKeyLocateIndex()];
            $key && $this->connect($key);
            try {
                if (!$this->_redis) {
                    throw new CException("参数中缺少键名,无法判断需要连接的redis实例<br/>");
                } else {
                    if (method_exists($this->_redis,$name)) {
                        return call_user_func_array([$this->_redis, $name], $arguments);
                    } else {
                        throw new CException("Redis类中调用的函数名:".$name."不存在");
                    }
                }
            } catch (CException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }

    /**
     * @use
     */
    private function __sleep()
    {
        $this->__destruct();
    }

    /**
     * @use 类被克隆时调用
     */
    private function __clone()
    {
        $this->__destruct();
    }

    /**
     * @use  析购函数,将内置属性制空
     */
    public function __destruct()
    {
        unset($this->_key);
        unset($this->_redis);
        unset($this->_name);
        $this->_active = [];
    }

}
