<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ObatMasuk */

$this->title = 'Tambah Obat Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Obat Masuk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obat-masuk-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
