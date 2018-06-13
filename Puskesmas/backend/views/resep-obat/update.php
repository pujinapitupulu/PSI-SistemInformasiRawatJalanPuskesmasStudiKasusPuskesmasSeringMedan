<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ResepObat */

$this->title = 'Update Resep Obat: ' . $model->id_resep;
$this->params['breadcrumbs'][] = ['label' => 'Resep Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_resep, 'url' => ['view', 'id' => $model->id_resep]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resep-obat-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'details' => $details,
        
    ]) ?>

</div>
