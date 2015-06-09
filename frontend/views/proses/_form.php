<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jadi_id')->textInput() ?>

    <?= $form->field($model, 'tugas_id')->textInput() ?>

    <?= $form->field($model, 'urutan')->textInput() ?>

    <?= $form->field($model, 'borong')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
