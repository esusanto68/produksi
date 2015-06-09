<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\KainDtl */

$this->title = 'Update Kain Dtl: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kain Dtls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kain-dtl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_dtl', [
        'model' => $model,
        'modelBeli' => $modelBeli,
    ]) ?>

</div>
