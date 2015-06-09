<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TpDtl */

$this->title = 'Create Tp Dtl';
$this->params['breadcrumbs'][] = ['label' => 'Tp Dtls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tp-dtl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
