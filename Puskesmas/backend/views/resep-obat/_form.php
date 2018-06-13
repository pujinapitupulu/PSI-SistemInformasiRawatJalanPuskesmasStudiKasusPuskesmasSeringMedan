<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Obat;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\ResepObat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resep-obat-form">

    <?php $form = ActiveForm::begin(['id' => 'resep-obat-form']); ?>

    <?= $form->field($model, 'id_rekam_medik')->textInput() ?>
    <!-- <?= $form->field($model, 'id_resep')->textInput() ?> -->
    <!-- <?= $form->field($model, 'nama_obat')->textarea(['rows' => '6']) ?> -->  
    <!-- <?= $form->field($model, 'dosis')->textarea(['rows' => '6']) ?> -->

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-th-list"></i> Detail Resep</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper',  // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items',          // required: css class selector
                'widgetItem' => '.item',                     // required: css class
                'limit' => 999,                                // the maximum times, an element can be cloned (default 999)
                'min' => 1,                                  // 0 or 1 (default 1)
                'insertButton' => '.add-item',               // css class
                'deleteButton' => '.remove-item',            // css class
                'model' => $details[0],
                'formId' => 'resep-obat-form',
                'formFields' => [
                    'id_resep_obat',
                    'id_obat',
                    'dosis',
                    'cara_penggunaan',
                ],
            ]); ?>
 
            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($details as $i => $detail): ?>
                <div class="item row">
                    <?php
                        // necessary for update action.
                        if (! $detail->isNewRecord) {
                            echo Html::activeHiddenInput($detail, "[{$i}]id_detail_resep");
                        }
                    ?>
                    <?php
                        // necessary for update action.
                        if (! $detail->isNewRecord) {
                            echo Html::activeHiddenInput($detail, "[{$i}]id_resep_obat");
                        }
                    ?>
                    
                    <div class="col-sm-8 col-md-4">
                        <?= $form->field($detail, "[{$i}]id_obat")->dropDownList(
                            ArrayHelper::map(Obat::find()->all(), 'id_obat', 'nama_obat'),  // Flat array ('id'=>'label')
                            ['prompt'=>'* Pilih Obat *']                          // options
                        ); ?>
                    </div>
                    <div class="col-sm-4 col-md-2">
                        <?= $form->field($detail, "[{$i}]dosis")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-10 col-md-5">
                        <?= $form->field($detail, "[{$i}]cara_penggunaan")->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-2 col-md-1 item-action">
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs">
                                <i class="glyphicon glyphicon-plus"></i></button> 
                            <button type="button" class="remove-item btn btn-danger btn-xs">
                                <i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                    </div>
                </div><!-- .row -->
 
            <?php endforeach; ?>
            </div>
 
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>




    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
