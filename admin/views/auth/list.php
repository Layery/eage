<?php
/**
 * Created by PhpStorm.
 * User: 未定义
 * Date: 2017/3/26
 * Time: 17:56
 */

use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Url;
use yii\grid\GridView;
use common\widgets\Alert;
use common\models\User;
$this->title = 'AuthManage';
$this->params['breadcrumbs'][] = $this->title;
$Bright = yii::$app->right;
$user = User::model();
?>



<div class="admin-content-body">
    <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
            <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                    <button type="button" class="am-btn am-btn-default" id="am-btn-create"><span class="am-icon-plus"></span>
                        <?= Html::a('新增', ['auth/create']) ?>
                    </button>
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
                                'name',
                                [
                                    'attribute' => 'actions',
                                    'value' => function($model) use($Bright){
                                        return $Bright->authCode2Name($model->actions);
                                    }
                                ],
                                [
                                    'attribute' => 'execute_id',
                                    'value' => function($model) use ($user) { return $user->findOne($model->execute_id)->username;}
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