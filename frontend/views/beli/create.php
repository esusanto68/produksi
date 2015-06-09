<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Beli */

$this->title = 'Create Beli';
$this->params['breadcrumbs'][] = ['label' => 'Belis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beli-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsKainDtl' => $modelsKainDtl
    ]) ?>

</div>
