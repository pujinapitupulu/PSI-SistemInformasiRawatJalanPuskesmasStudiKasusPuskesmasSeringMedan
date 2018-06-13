<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KepalaPuskesmas */

$this->title = $model->id_kepala_puskesmas;
$this->params['breadcrumbs'][] = ['label' => 'Kepala Puskesmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepala-puskesmas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_kepala_puskesmas], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_kepala_puskesmas], [
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
            'id_kepala_puskesmas',
            'nama',
            'id',
            'status',
        ],
    ]) ?>

</div>
