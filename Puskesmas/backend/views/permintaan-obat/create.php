<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PermintaanObat */

$this->title = 'Tambah Permintaan Obat';
$this->params['breadcrumbs'][] = ['label' => 'Permintaan Obat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permintaan-obat-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
