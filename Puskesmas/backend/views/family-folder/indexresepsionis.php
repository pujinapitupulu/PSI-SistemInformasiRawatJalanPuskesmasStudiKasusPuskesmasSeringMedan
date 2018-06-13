<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FamilyFolderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Family Folder';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-folder-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'noKK',
            'nama_kepala_keluarga',
            'alamat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    <!--  <p>
        <?= Html::a('Tambah Family Folder', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    
</div>
