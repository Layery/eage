<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataPicer;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

var_dump(DataPicer::widget());
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
           ['class' => 'common\widgets\MyActionColumn']
        ],
    ]);
?>
