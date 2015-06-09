<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model frontend\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-form">

    <?php 
        Pjax::begin(['id' => 'formPjax']);
        $form = ActiveForm::begin([
    	'id' => $model->formName().'Form',
        //'action' =>  'index.php?r=supplier/'. ($model->isNewRecord ? 'create' : 'update&id='.$model->id),
        'action' =>  'index.php?r=supplier/'. ($model->isNewRecord ? 'create' : 'update&id='.$model->id),
        'options' => ['data-pjax' => true ],
    ]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'kontak')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'kota')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 50]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); 
        Pjax::end();

    ?>
</div>

<?php
    $this->registerJs(";submitform('".$model->formName().'Form'."');");
?>