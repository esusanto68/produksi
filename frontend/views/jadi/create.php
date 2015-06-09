<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Jadi */

$this->title = 'Create Jadi';
$this->params['breadcrumbs'][] = ['label' => 'Jadis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsProses' => $modelsProses
    ]) ?>

</div>
