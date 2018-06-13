<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailResepObat */

$this->title = 'Update Detail Resep Obat: ' . $model->id_detail_resep;
$this->params['breadcrumbs'][] = ['label' => 'Detail Resep Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detail_resep, 'url' => ['view', 'id' => $model->id_detail_resep]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-resep-obat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
