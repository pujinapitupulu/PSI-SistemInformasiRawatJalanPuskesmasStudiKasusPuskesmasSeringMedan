<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resepsionis */

$this->title = $model->id_resepsionis;
$this->params['breadcrumbs'][] = ['label' => 'Resepsionis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resepsionis-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_resepsionis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_resepsionis], [
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
            'id_resepsionis',
            'nama',
            'jenis_kelamin',
            'alamat',
            'id_pendaftaran',
            'id_antrian',
            'nokk_pasien',
        ],
    ]) ?>

</div>
