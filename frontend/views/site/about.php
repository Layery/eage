<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <form method="POST" action="<?php echo Url::toRoute('site/about'); ?>">
        <input type="text" name="name">
        <input type="text" name="introduce">
        <input type="text" name="parent_id">
        <input type="submit" value="检索">
    </form>
</div>

<?php
   echo GridView::widget([
       'dataProvider' => $data,
       'columns' =>[
           'id',
           'name',
           'introduce',
           'parent_id',
           [
               'attribute'=>'dateline',
               'value'=> function($data) {return date('Y-m-d', $data['dateline']);},
           ],
       ],
    ]);
?>
