<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Tp */

$this->title = 'Create Tp';
$this->params['breadcrumbs'][] = ['label' => 'Tps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
