<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProsesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proses-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Proses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jadi_id',
            'tugas_id',
            'urutan',
            'borong',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
