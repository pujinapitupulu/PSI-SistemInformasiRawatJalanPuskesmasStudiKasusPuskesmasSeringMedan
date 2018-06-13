<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Resepsionis;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PendaftaranPasien */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pendaftaran-pasien-form">

<!-- <?php  
    $sql = "select noKK from family_folder";
    $command=array_values(Yii::$app->db->createCommand($sql)->queryAll());
    $daftarNoKK = array();

    for ($i=0; $i < count($command); $i++) 
    {
        array_push($daftarNoKK,array_values($command[$i]));
    } 


 
?>
 -->


    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $view_resepsionis = ArrayHelper::map(Resepsionis::find()->all(),'id_resepsionis','nama');
    ?>
    <?= $form->field($model, 'id_resepsionis')->dropDownList($view_resepsionis, ['prompt' => '-- Pilih Resepsionis --']) ?> 
    
    <!-- <?= $form->field($model, 'id_resepsionis')->textInput() ?> -->

    <?= $form->field($model, 'noKK_pasien') ?>  

    <?= $form->field($model, 'nama_pasien')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin') -> dropDownList(['1'=>'Perempuan','0'=>'Laki-laki'],['prompt'=>'select options'])?>

   <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::className(),[
        'name' => 'tgl_lahir',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]) 
    ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telepon')->textInput() ?>

    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
