<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BeliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Belis';
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

            'id',
            'nomor',
            'supplier_id',
            'tanggal',
            'kain_id',
            // 'harga',
            // 'sett',
            // 'total_berat',
            // 'no_nota',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
