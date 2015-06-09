<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TpDtl */

$this->title = 'Update Tp Dtl: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tp Dtls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tp-dtl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
