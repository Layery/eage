<?php
$params = array_merge([],[]
    // require(__DIR__ . '/../../common/config/params.php'),
    // require(__DIR__ . '/../../common/config/params-local.php'),
    // require(__DIR__ . '/params.php'),
    // require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-admin',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'admin\controllers',

    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'layery'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
//            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
//        'session' => [
//            // this is the name of the session cookie used for login on the frontend
//            'name' => 'admin',
//        ],
        // 'log' => [
        //     'targets' => [
        //         'file' => [
        //             'class' => 'yii\log\FileTarget',
        //             'levels' => ['error'],
        //             'categories' => ['error'],
        //             'logFile' => '@app/runtime/logs/error.log'
        //         ],
        //         'email' => [
        //             'class' => 'yii\log\EmailTarget',
        //             'levels' => ['error', 'warning'],
        //             'message' => [
        //                 'to' => ['weidingyi@aliyun.com'],
        //                 'subject' => 'New yii.cc log message',
        //             ],
        //         ],
        //     ],
        // ],
        'errorHandler' => [
            'errorAction' => 'admin/error',
        ],

        // url美化
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
];
