<?php

namespace backend\controllers;
use app\models\Model;
use Yii;
use app\models\ResepObat;
use app\models\DetailResepObat;
use app\models\DetailResepObatSearch;
use backend\models\ResepObatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * ResepObatController implements the CRUD actions for ResepObat model.
 */
class ResepObatController extends Controller
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
     * Lists all ResepObat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResepObatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ResepObat model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'details' => $this->findDetails($id),
        ]);
    }

    /**
     * Creates a new ResepObat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


public function actionCreate($id)
    {
        $model = new ResepObat();
        $details = [ new DetailResepObat ];
        $model->id_rekam_medik = $id;
        $model->status = 'request';
        
        if ($model->load(Yii::$app->request->post())) {
            $details = Model::createMultiple(DetailResepObat::classname());
            Model::loadMultiple($details, Yii::$app->request->post());
     
            // assign default transaction_id
            foreach ($details as $detail) {
                $detail->id_resep_obat = 0;
            }
     
            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($details),
                    ActiveForm::validate($model)
                );
            }
     
            // validate all models
            $valid1 = $model->validate();
            $valid2 = Model::validateMultiple($details);
            $valid = $valid1 && $valid2;
            // print_r ('here'.$valid);
            // jika valid, mulai proses penyimpanan
            //validasi masih belum jalan jadi dikomen dulu
            // if ($valid) {
                // mulai database transaction
                $detailresep = \Yii::$app->db->beginTransaction();
                try {
                    // simpan master record                   
                    if ($flag = $model->save(false)) {
                        // kemudian simpan detail records
                        foreach ($details as $detail) {
                            $detail->id_resep_obat = $model->id_resep;
                            if (! ($flag = $detail->save(false))) {
                                $detailresep->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        // sukses, commit database transaction
                        // kemudian tampilkan hasilnya
                        $detailresep->commit();
                        return $this->redirect(['view', 'id' => $model->id_resep]);
                    } else {
                        return $this->render('create', [
                            'model' => $model,
                            'details' => $details,
                        ]);
                    }
                } catch (Exception $e) {
                    // penyimpanan galga, rollback database transaction
                    $detailresep->rollBack();
                    throw $e;
                }
            // } else {
            //     return $this->render('create', [
            //         'model' => $model,
            //         'details' => $details,
            //         'error' => 'valid1: '.print_r($valid1,true).' - valid2: '.print_r($valid2,true),
            //     ]);
            // }
     
        } else {
            // inisialisai id 
            // diperlukan untuk form master-detail
            $model->id_resep = 0;
            // render view
            return $this->render('create', [
                'model' => $model,
                'details' => $details,
            ]);
        }


        
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id_resep]);
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);
    }
    /**
     * Updates an existing ResepObat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $details = $model->detailResepObat;
 
    if ($model->load(Yii::$app->request->post())) {
 
        $oldIDs = ArrayHelper::map($details, 'id_resep', 'id_resep_obat');
        $details = Model::createMultiple(DetailResepObat::classname(), $details);
        Model::loadMultiple($details, Yii::$app->request->post());
        $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($details, 'id_resep', 'id_resep_obat')));
 
        // assign default transaction_id
        foreach ($details as $detail) {
            $detail->id_resep_obat = $model->id_resep;
        }
 
        // ajax validation
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ArrayHelper::merge(
                ActiveForm::validateMultiple($details),
                ActiveForm::validate($model)
            );
        }
 
        // validate all models
        $valid1 = $model->validate();
        $valid2 = Model::validateMultiple($details);
        $valid = $valid1 && $valid2;
 
        // jika valid, mulai proses penyimpanan
        if ($valid) {
            // mulai database transaction
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                // simpan master record                   
                if ($flag = $model->save(false)) {
                    // delete dahulu semua record yang ada
                    if (! empty($deletedIDs)) {
                        DetailResepObat::deleteAll(['id' => $deletedIDs]);
                    }
                    // kemudian, simpan details record
                    foreach ($details as $detail) {
                        $detail->id_resep_obat = $model->id_resep;
                        if (! ($flag = $detail->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }
                }
                if ($flag) {
                    // sukses, commit database transaction
                    // kemudian tampilkan hasilnya
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id_resep]);
                }
            } catch (Exception $e) {
                // penyimpanan galga, rollback database transaction
                $transaction->rollBack();
                throw $e;
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'details' => $details,
                'error' => 'valid1: '.print_r($valid1,true).' - valid2: '.print_r($valid2,true),
            ]);
        }
    }
 
    // render view
    return $this->render('update', [
        'model' => $model,
        'details' => (empty($details)) ? [new DetailResepObat] : $details
    ]);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id_resep]);
        // }

        // return $this->render('update', [
        //     'model' => $model,
        // ]);
    }



public function actionDone($id)
    {
        $model = $this->findModel($id);
        $model->status = "Diterima";
   if ($model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('done', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ResepObat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();
        $model->$this->findModel($id);
        $details = $model->detailResep;
 
    // mulai database transaction
    $transaction = \Yii::$app->db->beginTransaction();
    try {
        // pertama, delete semua detail records
        foreach ($details as $detail) {
            $detail->delete();
        }
        // kemudian, delete master record
        $model->delete();
        // sukses, commit transaction
        $transaction->commit();
 
    } catch (Exception $e) {
        // gagal, rollback database transaction
        $transaction->rollBack();
    }
 
    return $this->redirect(['index']);

        // return $this->redirect(['index']);
    }

    /**
     * Finds the ResepObat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ResepObat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ResepObat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findDetails($id)
{
    $detailModel = new DetailResepObatSearch();
    return $detailModel->search(['DetailResepObatSearch'=>['id_resep_obat'=>$id]]);
}
}
