<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PermintaanObat */

$this->title = 'Update Permintaan Obat: ' . $model->id_permintaan;
$this->params['breadcrumbs'][] = ['label' => 'Permintaan Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_permintaan, 'url' => ['view', 'id' => $model->id_permintaan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="permintaan-obat-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
