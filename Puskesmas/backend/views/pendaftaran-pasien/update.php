<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PendaftaranPasien */

$this->title = 'Update Pendaftaran Pasien: ' . $model->id_pasien;
$this->params['breadcrumbs'][] = ['label' => 'Pendaftaran Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pasien, 'url' => ['view', 'id' => $model->id_pasien]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pendaftaran-pasien-update">
 
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


</div>
