<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ResepObat */

$this->title = $model->id_resep;
$this->params['breadcrumbs'][] = ['label' => 'Resep Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resep-obat-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_resep], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_resep], [
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
            'id_resep',
            'id_rekam_medik',
            // 'nama_obat',
            // 'dosis',
            'status',
        ],
    ]) ?>

    <div class="item panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-barcode"></i> Transaction Line Item</h3>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $details,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'id_obat',
                        'value' => 'obat.nama_obat',
                        'header' => 'Nama Obat',
                    ],
                    
                    'dosis',
                    'cara_penggunaan',
                ],
            ]); ?>
        </div>
    </div>

</div>
