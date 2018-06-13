<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DetailResepObat */

$this->title = 'Create Detail Resep Obat';
$this->params['breadcrumbs'][] = ['label' => 'Detail Resep Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-resep-obat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
