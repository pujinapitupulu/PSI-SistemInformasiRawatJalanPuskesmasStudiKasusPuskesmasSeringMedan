<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ObatKeluar */

$this->title = $model->id_obat_keluar;
$this->params['breadcrumbs'][] = ['label' => 'Obat Keluars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obat-keluar-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id_obat_keluar], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_obat_keluar], [
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
            'id_obat_keluar',
            'id_apoteker',
            'tgl_laporan',
            'file',
        ],
    ]) ?>

</div>
