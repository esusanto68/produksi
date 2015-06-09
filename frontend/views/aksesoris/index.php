<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AksesorisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aksesoris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aksesoris-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Aksesoris', ['value'=>Url::to(['aksesoris/create']),'class' => 'btn btn-success','id'=>'modalButton']) ?>
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

            'nama',
            'kode',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update}',
             'buttons' =>[
             'update' => function ($url, $model, $key) {
                    return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value'=>Url::to(['aksesoris/update','id'=>$model->id]),'class' => 'btn btn-link btn-sm','id'=>'modalButton'.$model->id]);
             }],
            'contentOptions' => ['class' => 'col-lg-1 text-center']],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
