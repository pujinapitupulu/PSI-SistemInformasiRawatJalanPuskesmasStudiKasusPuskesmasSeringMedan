<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObatKeluar */

$this->title = 'Update Obat Keluar: ' . $model->id_obat_keluar;
$this->params['breadcrumbs'][] = ['label' => 'Obat Keluars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_obat_keluar, 'url' => ['view', 'id' => $model->id_obat_keluar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obat-keluar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
