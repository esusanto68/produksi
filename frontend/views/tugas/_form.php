<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\widgets\Pjax;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model frontend\models\Tugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tugas-form">


   <?php 
        Pjax::begin(['id' => 'formPjax']);
        $form = ActiveForm::begin([
    	'id' => $model->formName().'Form',
        'action' =>  'index.php?r=tugas/'. ($model->isNewRecord ? 'create' : 'update&id='.$model->id),
        'options' => ['data-pjax' => true ],
        ]); 
    ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

	<?php // echo $form->field($model, 'borong')->textInput() ?>
    <?php 
    echo $form->field($model, 'borong')->widget(MaskMoney::classname(),
    	['options' => ['class' => 'text-right'],
    	'pluginOptions' => [
    		'prefix' => '',
    		'suffix' => '',
    		'integerOnly' => true,
    		'precision' => 2
    	]]) 
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php 
        ActiveForm::end(); 
        Pjax::end();
    ?>

</div>

<?php
    $this->registerJs(";submitform('".$model->formName().'Form'."');");
?>