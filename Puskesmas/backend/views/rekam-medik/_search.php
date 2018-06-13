<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RekamMedikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rekam-medik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_rekam_medik') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'id_dokter') ?>

    <?= $form->field($model, 'id_antrian') ?>

    <?= $form->field($model, 'tgl_rekam_medik') ?>

    <?php // echo $form->field($model, 'keluhan_pasien') ?>

    <?php // echo $form->field($model, 'diagnosa') ?>

    <?php // echo $form->field($model, 'jenis_penyakit_pasien') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
