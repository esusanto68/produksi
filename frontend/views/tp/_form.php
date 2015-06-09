<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'no_tp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_potong')->textInput() ?>

    <?= $form->field($model, 'roll')->textInput() ?>

    <?= $form->field($model, 'kain_id')->textInput() ?>

    <?= $form->field($model, 'total_berat')->textInput() ?>

    <?= $form->field($model, 'potongan')->textInput() ?>

    <?= $form->field($model, 'pot_dzn')->textInput() ?>

    <?= $form->field($model, 'pot_pcs')->textInput() ?>

    <?= $form->field($model, 'prosentase')->textInput() ?>

    <?= $form->field($model, 'sablon')->textInput() ?>

    <?= $form->field($model, 'sab_dzn')->textInput() ?>

    <?= $form->field($model, 'sab_pcs')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
