<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Apoteker */

$this->title = 'Update Apoteker: ' . $model->id_apoteker;
$this->params['breadcrumbs'][] = ['label' => 'Apotekers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_apoteker, 'url' => ['view', 'id' => $model->id_apoteker]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apoteker-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
