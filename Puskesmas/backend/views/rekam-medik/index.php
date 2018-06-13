<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RekamMedikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Rekam Mediks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rekam-medik-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_rekam_medik',
            'id_pasien',
            'id_dokter',
            'id_antrian',
            'tgl_rekam_medik',
            'keluhan_pasien',
            'diagnosa',
            'jenis_penyakit_pasien',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<!--      <p>
        <?= Html::a('Tambah Rekam Medik', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
</div>
