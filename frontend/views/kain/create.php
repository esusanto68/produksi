<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Kain */

$this->title = 'Create Kain';
$this->params['breadcrumbs'][] = ['label' => 'Kain', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kain-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
