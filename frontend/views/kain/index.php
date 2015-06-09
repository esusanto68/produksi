<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kain';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kain-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Kain', ['value'=>Url::to(['kain/create']),'class' => 'btn btn-success','id'=>'modalButton']) ?>
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

             'kode',
            ['attribute' => 'harga',
            'format' => ['decimal',0],
            'contentOptions' => ['class' => 'col-lg-2 text-right'],
            ],
            
            ['attribute' => 'sett',
            'format' => ['decimal',0],
            'contentOptions' => ['class' => 'col-lg-2 text-right'],
            ],

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update}',
             'buttons' =>[

                 'update' => function ($url, $model, $key) {

                    return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value'=>Url::to(['kain/update','id'=>$model->id]),'class' => 'btn btn-link btn-sm','id'=>'modalButton'.$model->id]);

                }
             ],
			'contentOptions' => ['class' => 'col-lg-1 text-center'],

             ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
