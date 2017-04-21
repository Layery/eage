<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/25
 * Time: 14:10
 */
use yii\grid\GridView;
use common\models\Auth;

$auth = new Auth();
?>

<div class="admin-content-body">
    <div class="am-g">
        <div class="am-u-sm-12">
            <table class="am-table am-table-striped am-table-hover table-main">
                <tbody>
                <tr>
                    <?php
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' =>[
                            [
                                'class'=>'yii\grid\CheckboxColumn',
                                'checkboxOptions' => function($model){
                                    return ['class' => 'gridview-check'];
                                },
                            ],
                            'id',
                            'username',
                            'email',
                            [
                                'attribute' => 'role',
                                'value' => function($model) use($auth) {
                                    return $model->role;
                                }
                            ],

                            [
                                'attribute' => 'created_at',
                                'value' => function($model) { return date('Y-m-d H:m', $model->created_at);}
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update} {delete}',
                            ]
                        ],
                        'layout' => '{items}  {pager}'
                    ]);
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>