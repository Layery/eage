<?php
namespace console\controllers;

use yii;
use yii\redis\cache;
use yii\console\Controller;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RedisController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $connection = new AMQPStreamConnection('127.0.0.1', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare('hello');
        $msg =  new AMQPMessage('啦啦啦');
        $channel->basic_publish($msg, 'hello');
        echo 'send msg hello world', PHP_EOL;
    }


    public function actionReceive()
    {
        $connection = new AMQPStreamConnection('127.0.0.1', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare('hello');
        echo "wait for msg, enter Ctrl+C to quite", PHP_EOL;

        $callback = function($msg) {
            echo "receive message ", $msg->body, "\n";
        };
        $rs = $channel->basic_consume('hello', '', false, true, false, false, $callback);
        while(count($channel->callbacks)) {
            $channel->wait();
        }
        $channel->close();
        $connection->close();
    }
}