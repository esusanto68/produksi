<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TugasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tugas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Tugas', ['value'=>Url::to(['tugas/create']),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
    ?>

    <?php Pjax::begin(['id'=>'PjaxGrid', 'timeout' => 10000]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'keterangan',
            ['attribute' => 'borong',
            'format' => ['decimal',0],
            'contentOptions' => ['class' => 'col-lg-2 text-right'],
            ],

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update}',
             'buttons' =>[
             'update' => function ($url, $model, $key) {
                    return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value'=>Url::to(['tugas/update','id'=>$model->id]),'class' => 'btn btn-link btn-sm','id'=>'modalButton'.$model->id]);
             }],
            'contentOptions' => ['class' => 'col-lg-1 text-center']],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
