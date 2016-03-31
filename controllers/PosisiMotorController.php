<?php

namespace app\controllers;

use Yii;
use app\models\PosisiMotor;
use app\models\PosisiMotorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PosisiMotorController implements the CRUD actions for PosisiMotor model.
 */
class PosisiMotorController extends Controller
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
     * Lists all PosisiMotor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PosisiMotorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PosisiMotor model.
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
     * Creates a new PosisiMotor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PosisiMotor();

        $user = Yii::$app->user->identity->username;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $id_motor = $_POST['PosisiMotor']['id_motor'];
            $posisi = $_POST['PosisiMotor']['posisi'];

            Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Insert data posisi motor dgn id motor : ' . $id_motor . ' // di '. $posisi .' // oleh user : ' . $user . '")')
                ->execute();

            return $this->redirect(['index']);;
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PosisiMotor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $user = Yii::$app->user->identity->username;
        $id_motor = $model->id_motor;
        $posisi_lama = $model->posisi;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $posisi_baru = $_POST['PosisiMotor']['posisi'];
            Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Update data posisi motor dgn id motor : ' . $id_motor . ' // dari '. $posisi_lama .' ke '. $posisi_baru .' oleh user : ' . $user . '")')
                ->execute();

            return $this->redirect(['index']);;
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PosisiMotor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $user = Yii::$app->user->identity->username;
        $model = $this->findModel($id);
        $posisi = $model->posisi;
        $id_motor = $model->id_motor;

        $this->findModel($id)->delete();
        Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Delete data posisi dengan id : '.$id.' // motor dgn id : '. $id_motor .' di : '. $posisi .' oleh user : '.$user.'")')
            ->execute();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PosisiMotor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PosisiMotor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PosisiMotor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
