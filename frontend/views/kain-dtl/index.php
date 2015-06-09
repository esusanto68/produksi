<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KainDtlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kain Dtls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kain-dtl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kain Dtl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'beli_id',
            'kain_id',
            'tgl_beli',
            'no_urut',
            // 'berat',
            // 'berat1',
            // 'berat2',
            // 'tgl_potong',
            // 'tp_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
