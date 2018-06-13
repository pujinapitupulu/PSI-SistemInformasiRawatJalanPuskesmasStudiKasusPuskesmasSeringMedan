<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Dokter;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RekamMedik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rekam-medik-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_pasien')->textInput() ?> -->
    <?= $form->field($model, 'id_pasien')->hiddenInput(['value'=> $model->id_pasien])->label(false); ?>

    <?= Html::label ('Nama Pasien : '.$model->antrian->pasien->nama_pasien.'( Id :  '.$model->antrian->id_pasien.' )', ['class' => 'control-label']) ?>

    <?php 
        $view_dokter = ArrayHelper::map(Dokter::find()->all(),'id_dokter','nama');
    ?>
    <!-- <?= $form->field($model, 'id_dokter')->dropDownList($view_dokter, ['prompt' => '-- Pilih Dokter --']) ?>  -->
    <!-- <?= Html::label ('Nama Dokter : '.$model->antrian->dokter->nama, ['class' => 'control-label']) ?> -->
    
    <!-- <?= $form->field($model, 'id_dokter')->textInput() ?> -->
    <?= $form->field($model, 'id_dokter')->hiddenInput(['value'=> $model->antrian->id_dokter])->label(false); ?>

    <?= $form->field($model, 'id_antrian')->textInput() ?>
    <?php $model->tgl_rekam_medik = Yii::$app->formatter->asDate($model->antrian->tgl_antrian, 'yyyy-MM-dd'); ?>
  
    <?= $form->field($model, 'tgl_rekam_medik')->widget(DatePicker::className(),[
        'name' => 'tgl_rekam_medik',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]) 
    ?>
    <?= $form->field($model, 'umur')->textInput() ?> 
    <?= $form->field($model, 'keluhan_pasien')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'diagnosa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_penyakit_pasien')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
