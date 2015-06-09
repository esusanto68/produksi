<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model frontend\models\Aksesoris */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aksesoris-form">

    <?php Pjax::begin(['id' => 'formPjax']);
    $form = ActiveForm::begin([
    	'id' => $model->formName().'Form',
    	//'action' => Url::to(['aksesoris/'. ($model->isNewRecord ? 'create' : 'update&id='.$model->id)]),
        //'action' =>  'index.php?r=kain/'. ($model->isNewRecord ? 'create' : 'update&id='.$model->id),
        'action' =>  $model->isNewRecord ? Url::to(['aksesoris/create']) : Url::to(['aksesoris/update', 'id'=>$model->id]),
        'options' => ['data-pjax' => true ],
    ]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
    $this->registerJs(";submitform('".$model->formName().'Form'."');");
?>