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
            'id',
            'name',
            'province',
            'city',
            'area_id',
            'dateline',
        ],
    ]);
?>
