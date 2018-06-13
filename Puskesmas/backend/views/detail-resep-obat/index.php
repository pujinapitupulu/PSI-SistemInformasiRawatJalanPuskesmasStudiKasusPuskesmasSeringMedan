<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailResepObatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Resep Obats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-resep-obat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detail Resep Obat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detail_resep',
            'id_resep_obat',
            'id_obat',
            'dosis',
            'cara_penggunaan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
