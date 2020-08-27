<?php

use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Apple Service';
?>

<h3>Apples:</h3>
<div class="site-index">
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
            'template' => '[{fall}] Eat: [{eathalf}] [{eat}]',
            'buttons' =>
            [
                'fall' => function ($url, $model, $key) {
                    return Html::a('Fall', ['apple/fall', 'id'=>$model->id]);
                },

                'eathalf' => function ($url, $model, $key) {
                    return Html::a('Half', ['apple/eat', 'id'=>$model->id, 'size' => $model->size/2]);
                },

                'eat' => function ($url, $model, $key) {
                    return Html::a('All', ['apple/eat', 'id'=>$model->id]);
                },

            ]
        ],
    ],
]) ?>

<h3>Add new apple:</h3>
<?php
use yii\widgets\ActiveForm;
$form = ActiveForm::begin([
    'id' => 'add-apple-form',
    'action' => ['add'],
    'options' => ['class' => 'form-vertical'],
]) ?>
<?= $form->field($addAppleForm, 'color')->textInput(['style'=>'width:100px']); ?>
<?= Html::submitButton('GO', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end() ?>


</div>

