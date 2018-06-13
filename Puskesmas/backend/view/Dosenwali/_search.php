<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PelanggaranMahasiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelanggaran-mahasiswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nama_mhs') ?>

    <?= $form->field($model, 'nim') ?>

    <?= $form->field($model, 'id_pelanggaran') ?>

    <?= $form->field($model, 'bentuk_pelanggaran') ?>

    <?= $form->field($model, 'poin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
