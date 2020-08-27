<?php

use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Apple Service';
?>
<div class="site-index">
    <!-- TODO: Apple Service view -->

    Apple Service view

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'color',
        'date_created:datetime',
        'date_fall:datetime',
        'status',
        'size',
        'state',
        [
            'class' => ActionColumn::class,
            'header' => 'Actions',
            'template' => '{fall}',
            'buttons' =>
            [
                'fall' => function ($url, $model, $key) {
                    return Html::a('Fall', ['apple/fall', 'id'=>$model->id]);
                },

            ]
        ],
    ],
]) ?>


</div>

