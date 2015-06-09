<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\KainDtl */

$this->title = 'Create Kain Dtl';
$this->params['breadcrumbs'][] = ['label' => 'Kain Dtls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kain-dtl-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form_dtl', [
        'model' => $model,
        'beli_id' => $beli_id,
        'kain_id' => $kain_id,
        'tgl_beli' => $tgl_beli,
    ]) ?>

</div>
