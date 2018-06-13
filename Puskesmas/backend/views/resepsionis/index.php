<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResepsionisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resepsionis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resepsionis-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Resepsionis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_resepsionis',
            'nama',
            'jenis_kelamin',
            'alamat',
            'id_pendaftaran',
            //'id_antrian',
            //'nokk_pasien',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
