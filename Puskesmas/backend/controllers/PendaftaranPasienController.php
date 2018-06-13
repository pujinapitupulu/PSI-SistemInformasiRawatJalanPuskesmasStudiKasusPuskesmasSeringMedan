<?php

namespace backend\controllers;


use Yii;
use app\models\PendaftaranPasien;
use app\models\AntrianDanKeluhan;
use app\models\RekamMedik;
use backend\models\RekamMedikSearch;
use backend\models\PendaftaranPasienSearch;
use backend\models\AntrianDanKeluhanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PendaftaranPasienController implements the CRUD actions for PendaftaranPasien model.
 */
class PendaftaranPasienController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PendaftaranPasien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PendaftaranPasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

 public $ids = 0;

public function getId($idGot)
{
    $ids = $idGot;
}
    /**
     * Displays a single PendaftaranPasien model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new RekamMedikSearch();
        $dataProvider = $searchModel->searchByPasienId((Yii::$app->request->queryParams),$id);
        $searchModel->id_pasien = $id;
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

 public function actionView1($id)
     {
        $searchModel = new AntrianDanKeluhanSearch();
        $searchModel->id_pasien = $id;
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         $model = new AntrianDanKeluhanSearch ();
         $ids = $id;
         return $this->render('view', [
             'model2' => $this->findModel($id),
             'model3' => $model,
                         'searchModel' => $searchModel,
             'dataProvider' => $dataProvider
         ]);



 }
    /**
     * Creates a new PendaftaranPasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    // public function actionCreate()
    // {
    //     $model = new PendaftaranPasien();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id_pendaftaran]);
    //     }
    //     else{
    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    //     }
    // }
 public function actionCreate()
    {
        $model = new PendaftaranPasien();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pasien]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionCreates($id)
    {
        $model = new PendaftaranPasien();
        $model->noKK_pasien = $id;
        $rows = (new \yii\db\Query())
                ->select(['alamat'])
                ->from('family_folder')
                ->where(['noKK' => $id])
                ->limit(1)
                ->all();
        foreach ($rows as $row){
            $model->alamat = $row['alamat'];
        }        
     
       // var_dump($model->noKK_pasien);
        if ($model->load(Yii::$app->request->post())) {
            
             $model->save();
            return $this->redirect(['view', 'id' => $model->id_pasien]);
        }
        return $this->render('creates', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PendaftaranPasien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
 public function actionCreatePasien($id_pasien)
    {

   return $this->render(Url::to(['antrian-dan-keluhan/create']), [
            'model' => $model,
        ]);

    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pasien]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing PendaftaranPasien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PendaftaranPasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PendaftaranPasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PendaftaranPasien::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
