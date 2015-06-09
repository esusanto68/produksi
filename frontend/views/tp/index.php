<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'no_tp',
            'tgl_potong',
            'roll',
            'kain_id',
            // 'total_berat',
            // 'potongan',
            // 'pot_dzn',
            // 'pot_pcs',
            // 'prosentase',
            // 'sablon',
            // 'sab_dzn',
            // 'sab_pcs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
