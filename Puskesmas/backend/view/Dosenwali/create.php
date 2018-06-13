<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PelanggaranMahasiswa */

$this->title = 'Create Pelanggaran Mahasiswa';
$this->params['breadcrumbs'][] = ['label' => 'Pelanggaran Mahasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelanggaran-mahasiswa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
