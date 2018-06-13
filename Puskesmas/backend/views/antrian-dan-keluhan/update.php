<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AntrianDanKeluhan */

$this->title = 'Ubah Antrian Dan Keluhan: ' . $model->id_antrian;
$this->params['breadcrumbs'][] = ['label' => 'Antrian Dan Keluhans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_antrian, 'url' => ['view', 'id' => $model->id_antrian]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="antrian-dan-keluhan-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
