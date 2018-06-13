<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObatMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Obat Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obat-masuk-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <!-- <?php //echo $this->render('_search', ['model' => $searchModel]); ?> -->

    <!-- <p>
        <?= Html::a('Tambah Obat Masuk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
 -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_obat_masuk',
            'id_apoteker',
            'jenis_obat',
            'tgl_masuk',
            'jumlah_obat_masuk',
            'file',

            ['class' => 'yii\grid\ActionColumn'],
            ['attribute' => 'Download',
            'format' => 'raw',
            'value' => function($data)
            {
                return 
                Html::a('download',['download','filename' => $data->file],['class' => 'btn btn-success']);
            }
            ],
        ],
    ]); ?>
</div>

