<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BeliSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beli-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nomor') ?>

    <?= $form->field($model, 'supplier_id') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'kain_id') ?>

    <?php // echo $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'sett') ?>

    <?php // echo $form->field($model, 'total_berat') ?>

    <?php // echo $form->field($model, 'no_nota') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
