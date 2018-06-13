<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Dokter;
use app\models\Resepsionis;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\AntrianDanKeluhan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antrian-dan-keluhan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pasien')->textInput() ?>
    <?= Html::label ('Nama Pasien : '.$model->pasien->nama_pasien.'   (Id: '.$model->pasien->id_pasien.')', ['class' => 'control-label']) ?>
    
    <?= $form->field($model, 'tinggi_badan_pasien')->textInput() ?>
    <?= $form->field($model, 'berat_badan_pasien')->textInput() ?>
    <?= $form->field($model, 'tekanan_darah_pasien')->textInput() ?>
    <?= $form->field($model, 'keluhan_pasien')->textInput(['maxlength' => true]) ?>
    
    <?php
        $view_dokter = ArrayHelper::map(Dokter::find()
        // ->where(['=', 'status', $data])
        ->all(),'id_dokter', 'nama','status');
    ?>
    <?= 
        $form->field($model, 'id_dokter')->dropDownList($view_dokter, ['prompt' => '-- Pilih Dokter --']) 
    ?> 
    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
