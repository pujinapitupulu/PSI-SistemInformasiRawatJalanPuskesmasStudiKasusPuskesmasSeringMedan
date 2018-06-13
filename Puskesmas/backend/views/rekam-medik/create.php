<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RekamMedik */

$this->title = 'Create Rekam Medik';
$this->params['breadcrumbs'][] = ['label' => 'Rekam Mediks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rekam-medik-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
