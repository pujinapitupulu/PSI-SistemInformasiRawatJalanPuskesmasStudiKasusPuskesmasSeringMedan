<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PermintaanObat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permintaan-obat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_apoteker')->textInput() ?>

    <?= $form->field($model, 'nama_obat')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'jenis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
