<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KainDtlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';

?>
<div class="kain-dtl-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Detail', ['value'=>Url::to(['beli/create-detail','beli_id'=>$beli_id,'kain_id'=>$kain_id,'tgl_beli'=>$tgl_beli]),'class' => 'btn btn-success','id'=>'modalButton']) ?> 
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
        'filterPosition' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'beli.nomor',
            'kain.kode',
            'tgl_beli',
            'no_urut',
            'berat',
            // 'berat1',
            // 'berat2',
            // 'tgl_potong',
            // 'tp_id',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update}',
             'buttons' =>[

                 'update' => function ($url, $model, $key) {

                    return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value'=>Url::to(['beli/update-detail','id'=>$model->id]),'class' => 'btn btn-link btn-sm','id'=>'modalButton'.$model->id]);

                }
             ],
            'contentOptions' => ['class' => 'col-lg-1 text-center'],

             ]

        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
