<?php
use app\models\Dokter;
use app\models\Resepsionis;
use app\models\Apoteker;
use app\models\KepalaPuskesmas;
?>

<aside class="main-sidebar">

    <section class="sidebar">
    <?php
      $user = yii::$app->user->id;
      $dokter = Dokter::find()->where(['id' => $user])->one();
      $resepsionis = Resepsionis::find()->where(['id' => $user])->one();
      $apoteker = Apoteker::find()->where(['id' => $user])->one();
      $kepala_puskesmas = KepalaPuskesmas::find()->where(['id' => $user])->one();
?>



       <!-- <Sidebar user panel  -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div> 
             <div class="pull-left info">
               <p>
               <?php echo $dokter['nama'] ?>
               <?php echo $resepsionis['nama'] ?>
                <?php echo $apoteker['nama'] ?>
                <?php echo $kepala_puskesmas['nama'] ?>
                </p>

                <a href="#"><i class="fa-circle text-success"></i> Online</a>
                </div>
                </div>

 



<?php if ($dokter['id']===$user){ ?>
<!--Daftar menu untuk login sebagai Dokter -->
<?= dmstr\widgets\menu::widget(
    [
'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [

  
     ['label' => 'Antrian', 'icon' => 'user-md', 'url' => ['/antrian-dan-keluhan/index']],         

     ['label' => 'Rekam Medik',
     'icon' => 'medkit',
     'url' => '#',
    'items' => [    
     ['label' => 'Daftar Rekam Medik', 'icon' => 'list', 'url' => ['/rekam-medik/index']],
             ],
             ],
                  
    ['label' => 'Resep', 'icon' => 'list', 'url' => ['/resep-obat/index']],
    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
    
   ],
]
        ) ?>


<?php } else if ($resepsionis['id']===$user){ ?>
<!--Daftar menu untuk login sebagai Resepsionis -->
<?= dmstr\widgets\menu::widget(
    [
'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
 ['label' => 'Daftar Pasien', 'icon' => 'list', 'url' => ['/pendaftaran-pasien/index']],
 ['label' => 'Antrian', 'icon' => 'user-md', 'url' => ['/antrian-dan-keluhan/index']],
                     
 ['label' => 'Family Folder', 'icon' => 'users', 'url' => ['/family-folder/index']],
              
  ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],


],
     ]
        ) ?>



<?php } else if ($apoteker['id']===$user){ ?>
<!--Daftar menu untuk login sebagai Apoteker -->
<?= dmstr\widgets\menu::widget(
    [
'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [

[
'label' => 'Data Obat',
'icon' => 'medkit',
'url' => '#',
'items' => [
['label' =>'Daftar Obat', 'icon' => 'users', 'url' => ['/obat/index']],    
['label' => 'Laporan Obat Masuk', 'icon' => 'arrow-circle-o-right', 'url' => ['/obat-masuk/index'],],
['label' => 'Laporan Obat Keluar', 'icon' => 'arrow-circle-o-right', 'url' => ['/obat-keluar/index'],],
                        ],
                    ],

['label' => 'Resep', 'icon' => 'list', 'url' => ['/resep-obat/index']],
['label' => 'Permintaan Obat', 'icon' => 'list', 'url' => ['/permintaan-obat/index']],                 
['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

],
     ]
        ) ?>



<?php } else if ($kepala_puskesmas['id']===$user){ ?>
<!--Daftar menu untuk login sebagai Kepala Puskesmas -->
<?= dmstr\widgets\menu::widget(
    [
'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [


  [
    'label' => 'Laporan Data Obat',
    'icon' => 'medkit',
    'url' => '#',
    'items' => [
         ['label' => 'Laporan Obat Masuk', 'icon' => 'arrow-circle-o-right', 'url' => ['/obat-masuk/index'],],
         ['label' => 'Laporan Obat Keluar', 'icon' => 'arrow-circle-o-right', 'url' => ['/obat-keluar/index'],],
                        ],
                    ],                  

   
    ['label' => 'Daftar Rekam Medik', 'icon' => 'list', 'url' => ['/rekam-medik/index']],                   
    ['label' => 'Permintaan Obat', 'icon' => 'list', 'url' => ['/permintaan-obat/index']],
    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

],
     ]
        ) ?>

<?php } ?>

    </section>

</aside>
