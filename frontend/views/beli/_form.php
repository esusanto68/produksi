<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Supplier;
use frontend\models\Kain;
//use frontend\models\Model;
use yii\widgets\MaskedInput;


/* @var $this yii\web\View */
/* @var $model frontend\models\Beli */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beli-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>
    <div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'nomor')->textInput(['maxlength' => 6, 'readonly' => true]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'tanggal')->widget(
            DateControl::classname(), [
            'type'=>DateControl::FORMAT_DATE,
            'displayFormat' => 'php:d-m-Y',
            'saveFormat' => 'php:Y-m-d',
        ]); ?>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'supplier_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Supplier::find()->select(['id', 'nama'])->orderBy('nama')->all(),'id','nama'),
            'options' => ['placeholder' => 'Supplier...'],
            //'pluginOptions' => ['allowClear' => true],
        ]);?>

    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'kain_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Kain::find()->select(['id', 'kode'])->orderBy('kode')->all(),'id','kode'),
            'options' => ['placeholder' => 'Kain...'],
            //'pluginOptions' => ['allowClear' => true],
        ]);?>

    </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'harga')->widget(\yii\widgets\MaskedInput::classname(), [
            'clientOptions' => [
                'alias' => 'decimal',
            ],
        ]) ?>

    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'sett')->widget(\yii\widgets\MaskedInput::classname(), [
            'clientOptions' => [
                'alias' => 'decimal',
            ],
        ]) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
    <?= $form->field($model, 'total_berat')->textInput(['readOnly' => true]) ?>
    </div>
    <div class="col-sm-6">
    <?= $form->field($model, 'no_nota')->textInput(['maxlength' => 30]) ?>
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
        'model' => $modelsKainDtl[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'kain_id',
            'tgl_beli',
            'no_urut',
            'berat',
        ],
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <div class="col-sm-3">
                    No. Urut
                </div>
                <div class="col-sm-4">
                    Berat
                </div>
                .
                <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>
            </h4>
        </div>
        <div class="panel-body">
            <div class="container-items"><!-- widgetBody -->
            <?php foreach ($modelsKainDtl as $i => $modelsKainDtl): ?>
                <div class="item"><!-- widgetItem -->
                        <div class="row">
                        <?php
                            // necessary for update action.
                            if (! $modelsKainDtl->isNewRecord) {
                                echo Html::activeHiddenInput($modelsKainDtl, "[{$i}]id");
                            }
                            echo Html::activeHiddenInput($modelsKainDtl, "[{$i}]kain_id");
                            echo Html::activeHiddenInput($modelsKainDtl, "[{$i}]tgl_beli");
                        ?>
                                <?php 
                                /*

                                echo $form->field($modelsKainDtl, "[{$i}]tgl_beli")->widget(
                                    DateControl::classname(), [
                                    'type'=>DateControl::FORMAT_DATE,
                                    'displayFormat' => 'php:d-m-Y',
                                    'saveFormat' => 'php:Y-m-d',
                                ])->label(false); 
                                */

                                ?>
                            <div class="col-sm-3">
                                <?= $form->field($modelsKainDtl, "[{$i}]no_urut")->textInput(['maxlength' => true, 'readonly' => true])->label(false)  ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelsKainDtl, "[{$i}]berat")->widget(\yii\widgets\MaskedInput::classname(), [
                                    'mask' => '99.99',
                                    'clientOptions' => [
                                        'rightAlign'=> true,
                                    ],
                                ])->label(false) ?>
                            </div>
                            <div class="col-sm-7">
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
    $('[id$=-berat]').blur(function() {
        var sum = 0;
        $('[id$=-berat]').each(function() {
            sum += Number($(this).val());
        });
        $('input#beli-total_berat').val(sum);
    });​​​​​​​​​
});
*/

$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    //console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    $(item).find("[id$=tgl_beli]").val($('#beli-tanggal').val() );
    $(item).find("[id$=kain_id]").val($('#beli-kain_id').val() );
    $(item).find('[id$=-berat]').blur(function() {
        var sum = 0;
        var x  = 0;
        $('[id$=-berat]').each(function() {
            if (!isNaN(x = Number($(this).val()))) {
                sum += x;
            }
        });
        $('input#beli-total_berat').val(sum);
    });

    $(item).find("[id$=berat]").focus();
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
    $('[id$=-berat]').blur(function() {
        var sum = 0;
        var x = 0;
        $('[id$=-berat]').each(function() {
            if (!isNaN(x = Number($(this).val()))) {
                sum += x;
            }
        });
        $('input#beli-total_berat').val(sum);
    });
});

script
);
