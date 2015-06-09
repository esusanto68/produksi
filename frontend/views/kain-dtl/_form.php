<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KainDtl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kain-dtl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'beli_id')->textInput() ?>

    <?= $form->field($model, 'kain_id')->textInput() ?>

    <?= $form->field($model, 'tgl_beli')->textInput() ?>

    <?= $form->field($model, 'no_urut')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'berat')->textInput() ?>

    <?= $form->field($model, 'berat1')->textInput() ?>

    <?= $form->field($model, 'berat2')->textInput() ?>

    <?= $form->field($model, 'tgl_potong')->textInput() ?>

    <?= $form->field($model, 'tp_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
