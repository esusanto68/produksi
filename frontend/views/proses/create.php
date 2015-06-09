<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Proses */

$this->title = 'Create Proses';
$this->params['breadcrumbs'][] = ['label' => 'Proses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
