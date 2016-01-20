<?php

namespace app\controllers;

use Yii;
use app\models\KondisiMotor;
use app\models\KondisiMotorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KondisiMotorController implements the CRUD actions for KondisiMotor model.
 */
class KondisiMotorController extends Controller
{
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
     * Lists all KondisiMotor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KondisiMotorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KondisiMotor model.
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
     * Creates a new KondisiMotor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KondisiMotor();

        $user = Yii::$app->user->identity->username;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $id_motor = $_POST['KondisiMotor']['id_motor'];
            $kondisi = $_POST['KondisiMotor']['kondisi'];
            Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Insert data kondisi motor : ' . $id_motor . ' // dengan kondisi '. $kondisi .' // oleh user : ' . $user . '")')
                ->execute();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KondisiMotor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $user = Yii::$app->user->identity->username;
        $id_motor = $model->id_motor;
        $kondisi_lama = $model->kondisi;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $kondisi_baru = $_POST['KondisiMotor']['kondisi'];
            Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Update data kondisi motor : ' . $id_motor . ' // dengan kondisi lama '. $kondisi_lama .'  menjadi '. $kondisi_baru .' // oleh user : ' . $user . '")')
                ->execute();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KondisiMotor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $user = Yii::$app->user->identity->username;
        $model = $this->findModel($id);
        $kondisi = $model->kondisi;

        $this->findModel($id)->delete();
        Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Delete data kondisi motor dgn id : ' . $id_motor . ' // dengan kondisi '. $kondisi .' // oleh user : ' . $user . '")')
            ->execute();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KondisiMotor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KondisiMotor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KondisiMotor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
