<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\PendaftaranPasien */

$this->title = $model->nama_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Pendaftaran Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftaran-pasien-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class = "row">
        <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_pasien], ['class' => 'btn btn-primary pull-right']) ?>
        <!--<?= Html::a('Hapus', ['delete', 'id' => $model->id_pasien], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
        </p>

    </div>
    
    <div class = "row">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pasien',
            'id_resepsionis',
            'noKK_pasien',
            'nama_pasien',
            'jenis_kelamin',
            'tgl_lahir',
            'alamat',
            'no_telepon',
            'pekerjaan',
        ],
    ]) ?>
    </div>
    
    <div class= "row">
        <p>
            <?= Html::a('Tambah Antrian Dan Keluhan', ['antrian-dan-keluhan/creates', 'id' => $model->id_pasien], ['class' => 'btn btn-success']) ?>
        </p>
    



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_dokter',
            'id_antrian',
            'tgl_rekam_medik',
            'keluhan_pasien',
            'diagnosa',
            'jenis_penyakit_pasien',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    </div>

    
</div>

 