<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FamilyFolder */

$this->title = 'Tambah Family Folder';
$this->params['breadcrumbs'][] = ['label' => 'Family Folder', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-folder-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
