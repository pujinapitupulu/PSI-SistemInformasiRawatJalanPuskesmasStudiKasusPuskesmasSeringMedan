<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RekamMedik */

$this->title = 'Update Rekam Medik: ' . $model->id_rekam_medik;
$this->params['breadcrumbs'][] = ['label' => 'Rekam Mediks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rekam_medik, 'url' => ['view', 'id' => $model->id_rekam_medik]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rekam-medik-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
