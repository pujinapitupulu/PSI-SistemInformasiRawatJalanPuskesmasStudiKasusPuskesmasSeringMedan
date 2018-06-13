<?php

namespace backend\controllers;

use Yii;
use app\models\AntrianDanKeluhan;
use app\models\RekamMedik;
use backend\models\AntrianDanKeluhanSearch;
use backend\models\RekamMedikSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AntrianDanKeluhanController implements the CRUD actions for AntrianDanKeluhan model.
 */
class AntrianDanKeluhanController extends Controller
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
     * Lists all AntrianDanKeluhan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AntrianDanKeluhanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // $searchModel->status = 'antri';
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
     * Displays a single AntrianDanKeluhan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionView($id)
     {
        $searchModel = new RekamMedikSearch();
        $searchModel->id_pasien = $id;
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         $model = new RekamMedik();
         $ids = $id;
         return $this->render('view', [
             'model' => $this->findModel($id),
             'model2' => $model,
                         'searchModel' => $searchModel,
             'dataProvider' => $dataProvider
         ]);



 }


public function actionCreate()
    {
        $model = new AntrianDanKeluhan();
        $model->status = 'antri';
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_antrian]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Creates a new AntrianDanKeluhan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreates($id)
    {
        $model = new AntrianDanKeluhan();
        $model->id_pasien = $id;
        $model->status = 'antri';
        // $nama='';
        // $rows = (new \yii\db\Query())
        //         ->select(['nama_pasien'])
        //         ->from('pendaftaran_pasien')
        //         ->where(['id_pasien' => $id])
        //         ->limit(1)
        //         ->all();
        // foreach ($rows as $row){
        //     $nama = $row['nama_pasien'];
        // }    
     
        if ($model->load(Yii::$app->request->post())) {
            
             $model->save();
            return $this->redirect(['view', 'id' => $model->id_antrian]);
        }
        return $this->render('creates', [
            'model' => $model,
        ]);
    }



public function actionCreateantrian($id_pasien)
    {
   return $this->render(Url::to(['rekam-medik/create']), [
            'model' => $model,
        ]);

    }
    /**
     * Updates an existing AntrianDanKeluhan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_antrian]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDone($id)
    {
        $model = $this->findModel($id);
        $model->status = "selesai";
   if ($model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('done', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing AntrianDanKeluhan model.
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
     * Finds the AntrianDanKeluhan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AntrianDanKeluhan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AntrianDanKeluhan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
