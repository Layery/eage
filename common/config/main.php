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
            'enableCsrfValidation' => false, // 关闭csrf验证
        ],
        'authManager' => [
            'class' => 'common\models\Auth',
            'itemTable' => '{{%b_item}}',
            'itemChildTable' => '{{%b_itemChildTable}}',
            'assignmentTable' => '{{%b_assignmentTable}}',
            'ruleTable' => '{{%b_ruleTable}}',
            /*
              设定默认角色
              'defaultRoles' => [
                'admin', 'editor'
            ]*/
        ],

    ],
    'params' => [
        //视图布局主题
        'layout' => 'ace',
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
