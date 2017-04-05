<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CH',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'redis' => [
            'class' => 'common\models\Redis'
        ],
        'curl' => [
            'class' => 'common\extensions\Curl',
        ],
        'request' => [
            //'enableCsrfValidation' => false, // 关闭csrf验证
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],

    ],
    'params' => [
        'redis'=>[
            'a:q'=>[//经纪人相关信息
                'host'=>'127.0.0.1',
                'port'=>6379,
                'database'=>0,
                'auth'=>'foryoudevelop',
            ],
            'db'=>[//司机相关信息
                'host'=>'127.0.0.1',
                'port'=>6379,
                'database'=>0,
                'auth'=>'foryoudevelop',
            ],
            'c:d:o'=>[//客户相关信息
                'host'=>'127.0.0.1',
                'port'=>6379,
                'database'=>0,
                // 'auth'=>'foryoudevelop',
            ],
            'other'=>[//剩余黑名单,管理员等
                'host'=>'127.0.0.1',
                'port'=>6379,
                'database'=>0,
                'auth'=>'foryoudevelop',
            ],
        ],
    ]
];
