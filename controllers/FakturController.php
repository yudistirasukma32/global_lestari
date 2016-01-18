<?php

namespace app\controllers;

use Yii;
use app\models\Faktur;
use app\models\FakturSearch;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * FakturController implements the CRUD actions for Faktur model.
 */
class FakturController extends Controller
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
     * Lists all Faktur models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FakturSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Faktur model.
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
     * Creates a new Faktur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Faktur();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            //$model->foto = UploadedFile::getInstance($model, 'foto');
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }
    public function actionCreate()
    {
        $model = new Faktur();

        if ($model->load(Yii::$app->request->post())) {
            try{
                $picture = UploadedFile::getInstance($model, 'foto');
                $model->foto = $_POST['Faktur']['nama_penerima'].'-'.$_POST['Faktur']['tgl'].'.'.$picture->extension;

                if($model->save()){
                    $picture->saveAs('uploads/' . $model->nama_penerima.'-'.$model->tgl.'.'.$picture->extension);
                    Yii::$app->getSession()->setFlash('success','Data saved!');
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
     * Updates an existing Faktur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Faktur model.
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
     * Finds the Faktur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faktur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Faktur::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
