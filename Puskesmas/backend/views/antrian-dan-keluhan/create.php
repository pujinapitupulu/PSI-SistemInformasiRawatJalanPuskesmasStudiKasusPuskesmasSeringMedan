<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AntrianDanKeluhan */

$this->title = 'Create Antrian Dan Keluhan';
$this->params['breadcrumbs'][] = ['label' => 'Antrian Dan Keluhans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antrian-dan-keluhan-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
