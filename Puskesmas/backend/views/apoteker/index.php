<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ApotekerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apoteker';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apoteker-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Apoteker', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_apoteker',
            'nama',
            'jenis_kelamin',
            'alamat',
            'id_ok',
            //'id_om',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
