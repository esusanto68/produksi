<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KainDtlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kain-dtl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'beli_id') ?>

    <?= $form->field($model, 'kain_id') ?>

    <?= $form->field($model, 'tgl_beli') ?>

    <?= $form->field($model, 'no_urut') ?>

    <?php // echo $form->field($model, 'berat') ?>

    <?php // echo $form->field($model, 'berat1') ?>

    <?php // echo $form->field($model, 'berat2') ?>

    <?php // echo $form->field($model, 'tgl_potong') ?>

    <?php // echo $form->field($model, 'tp_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
