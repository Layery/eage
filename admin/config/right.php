<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/27
 * Time: 11:51
 */
return [
    'system' => [
        'label' => '系统管理',
        'option' => [
            'create' => ['label' => '新增配置', 'actions' => ['create']]
        ]
    ],

    'category' => [
        'label' => '栏目管理',
        'option' => [
            'create' => ['label' => '新增栏目', 'actions' => ['create']],
            'delete' => ['label' => '删除栏目', 'actions' => ['delete']],
            'update' => ['label' => '更新栏目', 'actions' => ['update']],
            'list' => ['label' => '栏目列表', 'actions' => ['list']],
        ]
    ],
    'user' => [
        'label' => '会员管理',
        'option' => [
            'create' => ['label' => '新增会员', 'actions' => ['create']],
            'delete' => ['label' => '删除会员', 'actions' => ['delete']],
            'update' => ['label' => '更新会员', 'actions' => ['update']],
            'list' => ['label' => '会员列表', 'actions' => ['list']],
        ]
    ]
];