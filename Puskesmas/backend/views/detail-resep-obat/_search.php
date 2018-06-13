<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailResepObatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-resep-obat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_detail_resep') ?>

    <?= $form->field($model, 'id_resep_obat') ?>

    <?= $form->field($model, 'id_obat') ?>

    <?= $form->field($model, 'dosis') ?>

    <?= $form->field($model, 'cara_penggunaan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
