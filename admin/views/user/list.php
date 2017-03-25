<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/25
 * Time: 14:10
 */
use yii\helpers\Html;
use yii\grid\GridView;
use admin\assets\AppAsset;

AppAsset::addScript($this, '@web/js/a.js');
?>


<?= GridView::widget([
    'dataProvider' => $data,
    'columns' =>[
        'id',
        'username',
        'email',
        [
            'attribute' => 'role',
            'value' => function($data) {
                return $data['role'];
            }
        ],
        [
            'attribute' => 'created_at',
            'value' => function ($data) {return date('Y-m-d H:m', $data['created_at']);}
        ]
    ]
]);