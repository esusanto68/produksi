<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Kain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kain-form">

    <?php 
        Pjax::begin(['id' => 'formPjax']);
        $form = ActiveForm::begin([
    	'id' => $model->formName().'Form',
        //'action' =>  'index.php?r=kain/'. ($model->isNewRecord ? 'create' : 'update&id='.$model->id),
        'action' =>  $model->isNewRecord ? Url::to(['kain/create']) : Url::to(['kain/update', 'id'=>$model->id]),
        'options' => ['data-pjax' => true ],
        ]); 
    ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'sett')->textInput() ?>

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