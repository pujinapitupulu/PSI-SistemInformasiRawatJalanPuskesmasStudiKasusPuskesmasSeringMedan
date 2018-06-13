<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dokter */

$this->title = 'Tambah data Dokter';
$this->params['breadcrumbs'][] = ['label' => 'Dokter', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokter-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
