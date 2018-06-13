<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Apoteker */

$this->title = $model->id_apoteker;
$this->params['breadcrumbs'][] = ['label' => 'Apoteker', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apoteker-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_apoteker], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_apoteker], [
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
            'id_apoteker',
            'nama',
            'jenis_kelamin',
            'alamat',
            'id_ok',
            'id_om',
        ],
    ]) ?>

</div>
