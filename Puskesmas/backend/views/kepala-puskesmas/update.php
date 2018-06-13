<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KepalaPuskesmas */

$this->title = 'Update Kepala Puskesmas: ' . $model->id_kepala_puskesmas;
$this->params['breadcrumbs'][] = ['label' => 'Kepala Puskesmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kepala_puskesmas, 'url' => ['view', 'id' => $model->id_kepala_puskesmas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kepala-puskesmas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
