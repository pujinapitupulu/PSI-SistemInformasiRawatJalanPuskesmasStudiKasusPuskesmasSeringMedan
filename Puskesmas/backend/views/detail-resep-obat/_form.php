<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailResepObat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-resep-obat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_detail_resep')->textInput() ?>

    <?= $form->field($model, 'id_resep_obat')->textInput() ?>

    <?= $form->field($model, 'id_obat')->textInput() ?>

    <?= $form->field($model, 'dosis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cara_penggunaan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
