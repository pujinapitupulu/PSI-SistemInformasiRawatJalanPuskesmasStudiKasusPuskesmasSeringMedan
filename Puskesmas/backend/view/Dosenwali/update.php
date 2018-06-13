<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PelanggaranMahasiswa */

$this->title = 'Update Pelanggaran Mahasiswa: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Pelanggaran Mahasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelanggaran, 'url' => ['view', 'id' => $model->id_pelanggaran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelanggaran-mahasiswa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
