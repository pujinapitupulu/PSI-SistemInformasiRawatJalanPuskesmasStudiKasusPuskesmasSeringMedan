<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DetailResepObat */

$this->title = $model->id_detail_resep;
$this->params['breadcrumbs'][] = ['label' => 'Detail Resep Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-resep-obat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_detail_resep], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_detail_resep], [
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
            'id_detail_resep',
            'id_resep_obat',
            'id_obat',
            'dosis',
            'cara_penggunaan:ntext',
        ],
    ]) ?>

</div>
