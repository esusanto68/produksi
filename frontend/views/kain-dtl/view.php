<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\KainDtl */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kain Dtls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kain-dtl-view">

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
            'beli_id',
            'kain_id',
            'tgl_beli',
            'no_urut',
            'berat',
            'berat1',
            'berat2',
            'tgl_potong',
            'tp_id',
        ],
    ]) ?>

</div>
