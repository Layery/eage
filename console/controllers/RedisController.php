<?php
namespace console\controllers;

use yii;
use yii\console\Controller;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RedisController extends Controller
{
    public function init()
    {
        error_reporting('E_ALL');
    }
    public function actionIndex($ch, $message)
    {
        $connection = new AMQPStreamConnection('127.0.0.1', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare($ch);
        // 发送多条消息
        for ($i = 0, $c = 10; $i <= $c;) {
            $message = str_shuffle('when i was young , i listen to the radio waiting for my favorite sang when they played i listen to it make me smile');
            $message = substr($message, 0, 5);
            $msg =  new AMQPMessage($message);
            $channel->basic_publish($msg, '', $ch);
            echo 'send msg '. $message. ' on channel '. $ch, PHP_EOL;
            $i++;
            sleep(1);
        }
    }


    public function actionReceive($ch)
    {
        $receiveChannel = $ch;
        $connection = new AMQPStreamConnection('127.0.0.1', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare($receiveChannel);
        echo "wait for msg, enter Ctrl+C to quite", PHP_EOL;

        $callback = function($msg) use ($receiveChannel) {
            echo "receive message ", $msg->body, " in channel ". $receiveChannel, PHP_EOL;
            sleep(substr_count($msg->body, '.'));
            echo "done!", PHP_EOL;
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        // rabbitMQ 支持消息确认(当一个消费者未确认其消费完消息时, server不会给他发送消息, 直到他确认消费完毕 , 这个功能需要配置basic_consume第四个参数为false
        //$channel->basic_consume($receiveChannel, '', false, false, false, false, $callback);
        $channel->basic_consume($receiveChannel, '', false, false, false, false, $callback);
        while(count($channel->callbacks)) {
            $channel->wait();
        }
        $channel->close();
        $connection->close();
    }
}