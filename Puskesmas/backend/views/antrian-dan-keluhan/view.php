<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AntrianDanKeluhan */

$this->title = $model->id_antrian;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Antrian Dan Keluhan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antrian-dan-keluhan-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_antrian], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_antrian], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= Html::label ('Nama Pasien : '.$model->pasien->nama_pasien, ['class' => 'control-label']) ?>

    <?= DetailView::widget([
        'model' => $model, 
        'attributes' => [
            'id_antrian',
            'id_pasien',
            'tgl_antrian',
            'tinggi_badan_pasien',
            'berat_badan_pasien',
            'tekanan_darah_pasien',
            'keluhan_pasien',
            'status',
            'id_dokter', 
        ],
    ]) ?>



<p>
        <?= Html::a('Tambah Rekam Medik', ['rekam-medik/create', 'id' => $model->id_pasien, 'id2' => $model->id_antrian, 'id3' => $model->keluhan_pasien], ['class' => 'btn btn-success']) ?>
    </p>



</div>
