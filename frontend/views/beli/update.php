<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Beli */

$this->title = 'Update Beli: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Belis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="beli-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsKainDtl' => $modelsKainDtl        
    ]) ?>

</div>
