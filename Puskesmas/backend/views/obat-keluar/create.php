<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ObatKeluar */

$this->title = 'Tambah Obat Keluar';
$this->params['breadcrumbs'][] = ['label' => 'Obat Keluar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obat-keluar-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
