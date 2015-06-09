<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Beli;
use frontend\models\BeliSearch;
use frontend\models\KainDtl;
use frontend\models\Nomor;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Model;
use yii\web\Response;
// use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
// use yii\db\Query;

/**
 * BeliController implements the CRUD actions for Beli model.
 */
class BeliController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Beli models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BeliSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Beli model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Beli model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Beli;
        $modelsKainDtl = [new KainDtl];
        // \Yii::info($mdlNomor);
        if ($model->load(Yii::$app->request->post())) {

            $modelsKainDtl = Model::createMultiple(KainDtl::classname());
            Model::loadMultiple($modelsKainDtl, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsKainDtl),
                    ActiveForm::validate($model)
                );
            }
            //$x=$model->getNomor();


            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsKainDtl) && $valid;


            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    // Get Nomor
                    $modelNomor=Nomor::findOne('BL'.sprintf('%04d',$model->tanggal));
                    if (is_null($modelNomor)) {
                        $modelNomor = new Nomor;
                        $modelNomor->kode = 'BL'.sprintf('%04d',$model->tanggal);
                        $modelNomor->nomor = 0;
                        $modelNomor->length = 6;
                    }
                    $modelNomor->nomor++; 
                    $model->nomor = sprintf("%0{$modelNomor->length}d",$modelNomor->nomor);
                    $modelNomor->validate();
                    $modelNomor->save();

                    if ($flag = $model->save(false)) {
                        foreach ($modelsKainDtl as $modelKainDtl) {
                            $modelKainDtl->beli_id = $model->id;
                            // nomor urut kain
                            $modelNomor=Nomor::findOne('KD'.sprintf('%04d',$modelKainDtl->tgl_beli));
                            if (is_null($modelNomor)) {
                                $modelNomor = new Nomor;
                                $modelNomor->kode = 'KD'.sprintf('%04d',$modelKainDtl->tgl_beli);
                                $modelNomor->nomor = 0;
                                $modelNomor->length = 6;
                            }
                            // nomor urut Kain

                            if (empty($modelKainDtl->no_urut)) {
                                $modelNomor->nomor++; 
                                $modelKainDtl->no_urut = sprintf("%0{$modelNomor->length}d",$modelNomor->nomor);
                                $modelNomor->validate();
                                $modelNomor->save();
                            }
                            if (! ($flag = $modelKainDtl->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['update', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        $tz = new \DateTimeZone('Asia/Jakarta');
        $tg = new \DateTime('today',$tz);
        $model->tanggal = $tg->format('Y-m-d');

        return $this->render('create', [
            'model' => $model,
            'modelsKainDtl' => (empty($modelsKainDtl)) ? [new KainDtl] : $modelsKainDtl
        ]);
    }


    /**
     * Updates an existing Beli model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsKainDtl = $model->kainDtls;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsKainDtl, 'id', 'id');
            $modelsKainDtl = Model::createMultiple(Kaindtl::classname(), $modelsKainDtl);
            Model::loadMultiple($modelsKainDtl, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsKainDtl, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsKainDtl),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsKainDtl) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Kaindtl::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsKainDtl as $modelKainDtl) {
                            $modelKainDtl->beli_id = $model->id;
                            // nomor urut kain
                            $modelNomor=Nomor::findOne('KD'.sprintf('%04d',$modelKainDtl->tgl_beli));
                            if (is_null($modelNomor)) {
                                $modelNomor = new Nomor;
                                $modelNomor->kode = 'KD'.sprintf('%04d',$modelKainDtl->tgl_beli);
                                $modelNomor->nomor = 0;
                                $modelNomor->length = 6;
                            }
                            // nomor urut Kain

                            if (empty($modelKainDtl->no_urut)) {
                                $modelNomor->nomor++; 
                                $modelKainDtl->no_urut = sprintf("%0{$modelNomor->length}d",$modelNomor->nomor);
                                $modelNomor->validate();
                                $modelNomor->save();
                            }                            
                            if (! ($flag = $modelKainDtl->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['update', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsKainDtl' => (empty($modelsKainDtl)) ? [new Kaindtl] : $modelsKainDtl
        ]);
    }
    /**
     * Deletes an existing Beli model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Beli model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Beli the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Beli::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
