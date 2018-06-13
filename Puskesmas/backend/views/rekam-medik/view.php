<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\RekamMedik */

$this->title = $model->id_rekam_medik;
$this->params['breadcrumbs'][] = ['label' => 'Rekam Mediks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rekam-medik-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_rekam_medik], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_rekam_medik], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= Html::label ('Nama Pasien : '.$model->antrian->pasien->nama_pasien, ['class' => 'control-label']) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_rekam_medik',
            'id_pasien',
            'id_dokter',
            'id_antrian',
            'tgl_rekam_medik',
            'umur',
            'keluhan_pasien',
            'diagnosa',
            'jenis_penyakit_pasien',
        ],
    ]) ?>



<p>
        <?= Html::a('Tambah Resep', ['resep-obat/create', 'id' => $model->id_rekam_medik], ['class' => 'btn btn-success']) ?>
    </p>    



</div>
