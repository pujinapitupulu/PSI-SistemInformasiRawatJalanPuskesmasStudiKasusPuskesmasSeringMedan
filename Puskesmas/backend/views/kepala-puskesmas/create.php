<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KepalaPuskesmas */

$this->title = 'Create Kepala Puskesmas';
$this->params['breadcrumbs'][] = ['label' => 'Kepala Puskesmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepala-puskesmas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
