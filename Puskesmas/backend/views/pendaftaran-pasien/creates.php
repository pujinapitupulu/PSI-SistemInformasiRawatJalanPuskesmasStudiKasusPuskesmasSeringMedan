<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PendaftaranPasien */

$this->title = 'Tambah Pendaftaran Pasien';
$this->params['breadcrumbs'][] = ['label' => 'Pendaftaran Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendaftaran-pasien-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('forms', [
        'model' => $model,
    ]) ?>

</div>
