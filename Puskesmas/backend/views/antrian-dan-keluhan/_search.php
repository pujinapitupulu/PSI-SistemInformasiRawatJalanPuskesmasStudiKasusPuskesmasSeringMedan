<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AntrianDanKeluhanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antrian-dan-keluhan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_antrian') ?>

    <?= $form->field($model, 'id_pasien') ?>

    <?= $form->field($model, 'tgl_antrian') ?>

    <?= $form->field($model, 'tinggi_badan_pasien') ?>

    <?= $form->field($model, 'berat_badan_pasien') ?>

    <?php // echo $form->field($model, 'tekanan_darah_pasien') ?>

    <?php // echo $form->field($model, 'keluhan_pasien') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
