<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PendaftaranPasienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftaran-pasien-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--     <p>
        <?= Html::a('Tambah Data Pasien', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
</div>
