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

<div class="page-content">
    <div class="page-header">
        <h1>
            Tables
            <small>
                <i class="icon-double-angle-right"></i>
                Static &amp; Dynamic Tables
            </small>
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
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
                                'value' => function($model) { return date('Y-m-d H:i', $model->created_at);}
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