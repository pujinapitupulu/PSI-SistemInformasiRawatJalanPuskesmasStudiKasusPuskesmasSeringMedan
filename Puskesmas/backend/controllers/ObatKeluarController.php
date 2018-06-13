<?php

namespace backend\controllers;

use Yii;
use app\models\ObatKeluar;
use backend\models\ObatKeluarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ObatKeluarController implements the CRUD actions for ObatKeluar model.
 */
class ObatKeluarController extends Controller
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
     * Lists all ObatKeluar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObatKeluarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObatKeluar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ObatKeluar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ObatKeluar();

        if ($model->load(Yii::$app->request->post()))
         {
           $imageName = $model->id_apoteker;
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->file)
            {
                echo $model->file;
            }
            #echo $model->file;
            $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);

            //save the path in the db column
            $model->file = $imageName.'.'.$model->file->extension;
           
            $model->save();  




            return $this->redirect(['view', 'id' => $model->id_obat_keluar]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


  
public function actionDownload($id){
        $model=$this->findModel($id);

        /*$model2=Model::find()->where(['id_user'=>$id])->all();
        $jlh_transaksi=count($model2);
        if($jlh_transaksi>10){
        }*/
        $source_path = Yii::getAlias('@webroot/');
        $file=$source_path.$model['file'];
        // var_dump($file);die();
        //var_dump($file);
        //die();
        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
      }
    }



    /**
     * Updates an existing ObatKeluar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_obat_keluar]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


 
    /**
     * Deletes an existing ObatKeluar model.
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
     * Finds the ObatKeluar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObatKeluar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObatKeluar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
