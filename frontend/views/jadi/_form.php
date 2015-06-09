<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use frontend\models\Tugas;

/* @var $this yii\web\View */
/* @var $model frontend\models\Jadi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadi-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'maxpct')->textInput() ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'harga')->textInput() ?>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'borong')->textInput() ?>
    </div>
    </div>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 50, // the maximum times, an element can be added (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsProses[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'urutan',
            'tugas_id',
            'borong',
        ],
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-heading" >
            <h4>
                <div class="col-sm-2">
                    Urutan
                </div>
                <div class="col-sm-6">
                    Tugas
                </div>
                <div class="col-sm-2">
                    Borong
                </div>
                .
                <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>
            </h4>
        </div>
        <div class="panel-body">
            <div class="container-items"><!-- widgetBody -->
            <?php foreach ($modelsProses as $i => $modelsProses): ?>
                <div class="item"><!-- widgetItem -->
                    <div class="row">
                    <?php
                        // necessary for update action.
                        if (! $modelsProses->isNewRecord) {
                            echo Html::activeHiddenInput($modelsProses, "[{$i}]id");
                        }
                    ?>
                    <div class='col-sm-2'>
                        <?= $form->field($modelsProses, "[{$i}]urutan")->textInput()->label(false) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($modelsProses, "[{$i}]tugas_id")->widget(Select2::classname(), [
                            //'data' => ArrayHelper::map(Tugas::find()->select(['id', 'keterangan'])->orderBy('keterangan')->all(),'id','keterangan'),
                            'data' => ArrayHelper::map(Tugas::find()->select(['id', 'keterangan'])->orderBy('keterangan')->all() ,'id','keterangan'),
                            'options' => ['placeholder' => 'Tugas...'],
                            //'pluginOptions' => ['allowClear' => true],
                        ])->label(false);?>

                    </div>
                    <div class="col-sm-2">
                        <?= $form->field($modelsProses, "[{$i}]borong")->widget(\yii\widgets\MaskedInput::classname(), [
                            'clientOptions' => [
                                'alias'=> 'decimal',
                            ],
                        ])->label(false) ?>
                    </div>
                    <div class="col-sm-2">
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    </div><!-- .row -->
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div><!-- .panel -->

    <?php DynamicFormWidget::end(); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Exit', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 

$this->registerJs(
<<<'script'
/*
$(function() {
    $('[id$=-borong]').blur(function() {
        var sum = 0;
        var x = 0;
        $('[id$=-borong]').each(function() {
            if (!isNaN(x = Number($(this).val()))) {
                sum += x;
            }
        });
        $('input#jadi-borong').val(sum);
    });​​​​​​​​​
});
*/

$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    //console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {

    $(item).find('[id$=-borong]').blur(function() {
        var sum = 0;
        var x  = 0;
        $('[id$=-borong]').each(function() {
            if (!isNaN(x = Number($(this).val()))) {
                sum += x;
            }
        });
        $('input#jadi-borong').val(sum);
    });
    $(item).find('[id$=-urutan]').val($('.item').length*10);
    $(item).find("[id$=-urutan]").focus();
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    //console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});

$(function() {
    $('[id$=-borong]').blur(function() {
        var sum = 0;
        var x = 0;
        $('[id$=-borong]').each(function() {
            if (!isNaN(x = Number($(this).val()))) {
                sum += x;
            }
        });
        $('input#jadi-borong').val(sum);
    });
});

script
);