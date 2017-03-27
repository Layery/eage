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
    <hr>
    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <button type="button" class="am-btn am-btn-default" id="am-btn-create"><span class="am-icon-plus"></span> 新增</button>
                    <button type="button" class="am-btn am-btn-default" id="am-btn-delete"><span class="am-icon-delete"></span> 删除选中</button>
                </div>
            </div>
        </div>
        <div class="am-u-sm-12 am-u-md-3">
            <div class="am-input-group am-input-group-sm">
                <input type="text" class="am-form-field">
                <span class="am-input-group-btn">
                    <button class="am-btn am-btn-default" type="button">搜索</button>
                </span>
            </div>
        </div>
    </div>
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
                                'value' => function($model) use ($auth) {
                                    return $auth->findOne($model->role)->name;
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