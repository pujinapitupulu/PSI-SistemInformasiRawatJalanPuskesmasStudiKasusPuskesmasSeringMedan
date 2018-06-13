<?php

namespace backend\controllers;

use Yii;
use app\models\FamilyFolder;
use app\models\PendaftaranPasien;
use backend\models\PendaftaranPasienSearch;
use backend\models\FamilyFolderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * FamilyFolderController implements the CRUD actions for FamilyFolder model.
 */
class FamilyFolderController extends Controller
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
     * Lists all FamilyFolder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FamilyFolderSearch();
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
     * Displays a single FamilyFolder model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
     {
        $searchModel = new PendaftaranPasienSearch();
        $searchModel->noKK_pasien = $id;
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         $model = new PendaftaranPasien();
         $ids = $id;
         return $this->render('view', [
             'model' => $this->findModel($id),
             'model2' => $model,
                         'searchModel' => $searchModel,
             'dataProvider' => $dataProvider
         ]);



 }


 

    /**
     * Creates a new FamilyFolder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FamilyFolder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->noKK]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Creates a new FamilyFolder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

   //  public function actionCreatePasien($noKK)
   //  {

   // return $this->render(Url::to(['pendaftaran-pasien/create']), [
   //          'model' => $model,
   //      ]);

   //  }


  public function actionCreatePasien($noKK)
    {

   return $this->render(Url::to(['pendaftaran-pasien/create']), [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing FamilyFolder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->noKK]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing FamilyFolder model.
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
     * Finds the FamilyFolder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FamilyFolder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FamilyFolder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
