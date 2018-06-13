<?php
use yii\helpers\Html;
use app\models\Dokter;
use app\models\Resepsionis;
use app\models\Apoteker;
use app\models\KepalaPuskesmas;

/* @var $this \yii\web\View */
/* @var $content string */

$user = yii::$app->user->id;
$dokter = Dokter::find()->where(['id' => $user])->one();
$resepsionis = Resepsionis::find()->where(['id' => $user])->one();
$apoteker = Apoteker::find()->where(['id' => $user])->one();
$kepala_puskesmas = KepalaPuskesmas::find()->where(['id' => $user])->one();
?>



<header class="main-header">

    <?= Html::a('<span class="logo-mini">PUSKESMAS</span><span class="logo-lg">' . 'PUSKESMAS' . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">PUSKESMAS</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

               
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"> 
                        <?php echo $dokter['nama'] ?>
                        <?php echo $resepsionis['nama'] ?>
                        <?php echo $apoteker['nama'] ?>
                        <?php echo $kepala_puskesmas['nama'] ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?php echo $dokter['nama'] ?>
                                <small> <?php echo $dokter['status'] ?></small>
                                 <?php echo $resepsionis['nama'] ?>
                                <small> <?php echo $resepsionis['status'] ?></small>
                                 <?php echo $apoteker['nama'] ?>
                                <small> <?php echo $apoteker['status'] ?></small>
                                 <?php echo $kepala_puskesmas['nama'] ?>
                                <small> <?php echo $kepala_puskesmas['status'] ?></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
            
                                <?= Html::a(
                                    'Profil',
                                    ['/dokter','id' =>$dokter['id_dokter']],
                                    ['/resepsionis','id' =>$resepsionis['id_resepsionis']],
                                    ['/apoteker','id' =>$apoteker['id_apoteker']],
                                    ['/kepala_puskesmas','id' =>$kepala_puskesmas['id_kepala_puskesmas']],
                                   
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>

                            <div>
                            <div class="pull-right">
                            <?= Html::a(

                                'Log out',
                                ['/site/logout'],
                                ['data-method'=> 'post']
                                 ) ?>

                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
