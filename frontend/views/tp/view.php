<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tp */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'no_tp',
            'tgl_potong',
            'roll',
            'kain_id',
            'total_berat',
            'potongan',
            'pot_dzn',
            'pot_pcs',
            'prosentase',
            'sablon',
            'sab_dzn',
            'sab_pcs',
        ],
    ]) ?>

</div>
