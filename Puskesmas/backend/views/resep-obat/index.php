<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResepObatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Resep Obats Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resep-obat-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_resep',
            'id_rekam_medik',
            'nama_obat',
            'dosis',
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





    <!--  <p>
        <?= Html::a('Tambah Resep Obat', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
</div>
