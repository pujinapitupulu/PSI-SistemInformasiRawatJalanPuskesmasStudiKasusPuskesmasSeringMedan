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

    <p>
        <?= Html::a('Tambah Obat Masuk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_obat_masuk',
            'id_apoteker',
            'tgl_laporan',
           
             [
            'attribute' => 'file',
            'format' => 'raw',
            'value' => function($model){
                return Html::a('Download File', ['download', 'id' => $model->id_obat_masuk], ['class' => '']);
            }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>


