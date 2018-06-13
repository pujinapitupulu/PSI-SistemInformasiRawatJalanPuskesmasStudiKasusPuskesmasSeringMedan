<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FamilyFolder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="family-folder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'noKK')->textInput() ?>

    <?= $form->field($model, 'nama_kepala_keluarga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
