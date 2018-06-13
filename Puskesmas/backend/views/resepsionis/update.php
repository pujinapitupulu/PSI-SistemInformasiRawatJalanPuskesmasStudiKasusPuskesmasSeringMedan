<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resepsionis */

$this->title = 'Update Resepsionis: ' . $model->id_resepsionis;
$this->params['breadcrumbs'][] = ['label' => 'Resepsionis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_resepsionis, 'url' => ['view', 'id' => $model->id_resepsionis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resepsionis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
