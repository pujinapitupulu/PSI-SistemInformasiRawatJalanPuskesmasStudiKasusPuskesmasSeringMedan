<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObatMasuk */

$this->title = 'Update Obat Masuk: ' . $model->id_obat_masuk;
$this->params['breadcrumbs'][] = ['label' => 'Obat Masuks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_obat_masuk, 'url' => ['view', 'id' => $model->id_obat_masuk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="obat-masuk-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
