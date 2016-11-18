<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
   echo GridView::widget([
        'dataProvider' => $data,
       'columns' => [
           ['class' => 'yii\grid\SerialColumn'],
           'id',
           'name',
           'province',
           'city',
           'area_id',
           'dateline',
           'label' => [
               'class' => 'yii\grid\ActionColumn',

           ]
        ],
    ]);
?>
