<?php


use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AntrianDanKeluhanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Antrian Dan Keluhan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antrian-dan-keluhan-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Tambah Antrian Dan Keluhan', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_antrian',
            'id_pasien',
            'tgl_antrian',
            'tinggi_badan_pasien',
            'berat_badan_pasien',
            'tekanan_darah_pasien',
            'keluhan_pasien',
            'status',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{done} {view} {update} {delete}',
            'buttons' => [
            'done' => function($url){
                return Html::a('<span class="glyphicon glyphicon-ok"></span>',
                $url,
                ['title' => 'done',
                'data-pjax' => '0'
                ]
                );
            }
            ]
            ],
        ],
    ]); ?>
</div>

