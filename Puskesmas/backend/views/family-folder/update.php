<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FamilyFolder */

$this->title = 'Update Family Folder: ' . $model->noKK;
$this->params['breadcrumbs'][] = ['label' => 'Family Folders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->noKK, 'url' => ['view', 'id' => $model->noKK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="family-folder-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [ 
        'model' => $model,
    ]) ?>



</div>
