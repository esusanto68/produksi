<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BeliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembelian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beli-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Beli', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nomor',
            'supplier.nama',
            [
               'attribute' => 'tanggal',
                'format' =>  ['date', 'php:d-m-Y'],
               'options' => ['width' => '200']
            ],            
            'kain.kode',
            'harga',
            //'kdnomor',
            // 'sett',
            // 'total_berat',
            // 'no_nota',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update}',
            ],
        ],
    ]); ?>

</div>
