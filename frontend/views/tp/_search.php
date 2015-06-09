<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'no_tp') ?>

    <?= $form->field($model, 'tgl_potong') ?>

    <?= $form->field($model, 'roll') ?>

    <?= $form->field($model, 'kain_id') ?>

    <?php // echo $form->field($model, 'total_berat') ?>

    <?php // echo $form->field($model, 'potongan') ?>

    <?php // echo $form->field($model, 'pot_dzn') ?>

    <?php // echo $form->field($model, 'pot_pcs') ?>

    <?php // echo $form->field($model, 'prosentase') ?>

    <?php // echo $form->field($model, 'sablon') ?>

    <?php // echo $form->field($model, 'sab_dzn') ?>

    <?php // echo $form->field($model, 'sab_pcs') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
