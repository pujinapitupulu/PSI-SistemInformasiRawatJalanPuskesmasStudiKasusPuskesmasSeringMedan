<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ObatKeluar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obat-keluar-form">

   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id_obat_keluar')->textInput() ?>

    <?= $form->field($model, 'id_apoteker')->textInput() ?>

   

    <?= $form->field($model, 'tgl_laporan')->widget(DatePicker::className(),[
        'name' => 'tgl_laporan',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]) 
    ?>

   

   <?= $form->field($model, 'file')->FileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
