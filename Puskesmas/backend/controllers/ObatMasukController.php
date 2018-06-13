<?php

namespace backend\controllers;

use Yii;
use app\models\ObatMasuk;
use backend\models\ObatMasukSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * ObatMasukController implements the CRUD actions for ObatMasuk model.
 */
class ObatMasukController extends Controller
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
     * Lists all ObatMasuk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObatMasukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObatMasuk model.
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
     * Creates a new ObatMasuk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ObatMasuk();

        if ($model->load(Yii::$app->request->post())) 
        {
           $imageName = $model->tgl_laporan;
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->file)
            {
                echo $model->file;
            }
            #echo $model->file ;
            $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);

            //save the path in the db column
            $model->file = 'uploads/'.$imageName.'.'.$model->file->extension;
           
            $model->save();  


            return $this->redirect(['view', 'id' => $model->id_obat_masuk]);
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
     * Updates an existing ObatMasuk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_obat_masuk]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    

    /**
     * Deletes an existing ObatMasuk model.
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
     * Finds the ObatMasuk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObatMasuk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObatMasuk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
