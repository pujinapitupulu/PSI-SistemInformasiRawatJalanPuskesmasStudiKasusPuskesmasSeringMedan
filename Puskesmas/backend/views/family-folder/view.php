<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\FamilyFolder */

$this->title = $model->noKK;
$this->params['breadcrumbs'][] = ['label' => 'Family Folders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-folder-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        
        <?= Html::a('Ubah', ['update', 'id' => $model->noKK], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->noKK], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'noKK',
            'nama_kepala_keluarga',
            'alamat',
        ],
    ]) ?>

<h2>Daftar Keluarga</h2>
<br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pasien',
            'id_resepsionis',
            'noKK_pasien',
            'nama_pasien',
            'jenis_kelamin',
            'tgl_lahir',
            'alamat',
            'no_telepon',
            'pekerjaan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <p>
        <?= Html::a('Tambah Anggota', ['pendaftaran-pasien/creates', 'id' => $model->noKK], ['class' => 'btn btn-success']) ?>
    </p>


</div>
