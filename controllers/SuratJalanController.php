<?php

namespace app\controllers;

use Yii;
use app\models\SuratJalan;
use app\models\SuratJalanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SuratJalanController implements the CRUD actions for SuratJalan model.
 */
class SuratJalanController extends Controller
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
     * Lists all SuratJalan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratJalanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratJalan model.
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
     * Creates a new SuratJalan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratJalan();

        if ($model->load(Yii::$app->request->post())) {
            try{
                $picture = UploadedFile::getInstance($model, 'foto');
                $model->foto = 'SuratJalan - ' . $_POST['SuratJalan']['nama_penerima'].' - '.$_POST['SuratJalan']['tgl_pengiriman'].'.'.$picture->extension;

                if($model->save()){

                    $id_sj = $model->id;
                    $user = Yii::$app->user->identity->username;

                    $picture->saveAs('uploads/suratjalan/' . 'SuratJalan - '. $model->nama_penerima.' - '.$model->tgl_pengiriman.'.'.$picture->extension);
                    Yii::$app->getSession()->setFlash('success','Data saved!');

                    Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Insert data surat jalan dengan id : '.$id_sj.' // oleh user : '.$user.'")')
                        ->execute();

                    return $this->redirect(['view','id'=>$model->id]);
                }else{
                    Yii::$app->getSession()->setFlash('error','Data not saved!');
                    //var_dump($_POST);
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }catch(Exception $e){
                Yii::$app->getSession()->setFlash('error',"{$e->getMessage()}");
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratJalan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            try{
                $picture = UploadedFile::getInstance($model, 'foto');
                $model->foto = 'SuratJalan - '. $_POST['SuratJalan']['nama_penerima'].' - '.$_POST['SuratJalan']['tgl_pengiriman'].'.'.$picture->extension;

                if($model->save()){

                    $id_sj = $model->id;
                    $user = Yii::$app->user->identity->username;

                    $picture->saveAs('uploads/suratjalan/'  . 'SuratJalan - '.  $model->nama_penerima.' - '.$model->tgl_pengiriman.'.'.$picture->extension);
                    Yii::$app->getSession()->setFlash('success','Data saved!');

                    Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Update data surat jalan dengan id : '.$id_sj.' // oleh user : '.$user.'")')
                        ->execute();

                    return $this->redirect(['view','id'=>$model->id]);
                }else{
                    Yii::$app->getSession()->setFlash('error','Data not saved!');
                    //var_dump($_POST);
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }catch(Exception $e){
                Yii::$app->getSession()->setFlash('error',"{$e->getMessage()}");
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SuratJalan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $user = Yii::$app->user->identity->username;
        $this->findModel($id)->delete();
        Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Delete data surat jalan dengan id : '.$id.' //  oleh user : '.$user.'")')
            ->execute();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SuratJalan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratJalan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratJalan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
