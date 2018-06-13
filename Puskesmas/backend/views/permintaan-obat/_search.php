<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PermintaanObatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permintaan-obat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_permintaan') ?>

    <?= $form->field($model, 'id_apoteker') ?>

    <?= $form->field($model, 'nama_obat') ?>

    <?= $form->field($model, 'jenis') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
