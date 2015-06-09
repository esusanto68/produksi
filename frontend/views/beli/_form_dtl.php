<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use frontend\models\Kain;

/* @var $this yii\web\View */
/* @var $model frontend\models\KainDtl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kain-dtl-form">

    <?php 
        Pjax::begin(['id' => 'formPjax']);
        /*
        $form = ActiveForm::begin([
        'id' => 'kain-dtlForm',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
        ]); 
        */

        $form = ActiveForm::begin([
        'id' => $model->formName().'Form',
        'action' => Url::to(['beli/'.($model->isNewRecord ? 'create-detail' : 'update-detail'), 'id'=>$model->id]),
        'action' => ($model->isNewRecord ? 
            Url::to(['beli/create-detail', 'beli_id'=>$beli_id,'kain_id'=>$kain_id,'tgl_beli'=>$tgl_beli]):
            Url::to(['beli/update-detail', 'id'=>$model->id])),
        'options' => ['data-pjax' => true ],
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
        ]); 

    ?>

    <?= $form->field($model, 'beli_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'kain_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Kain::find()->select(['id', 'kode'])->orderBy('kode')->all(),'id','kode'),
        'options' => ['placeholder' => 'Supplier...'],
        //'pluginOptions' => ['allowClear' => true],
    ]);?>

    <?= $form->field($model, 'tgl_beli')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Tgl Pembelian ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd/mm/yyyy'
        ]])
     ?>
    <?= $form->field($model, 'no_urut')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'berat')->textInput() ?>

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