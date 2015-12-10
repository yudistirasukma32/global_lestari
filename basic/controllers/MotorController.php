<?php

namespace app\controllers;

use Yii;
use app\models\Motor;
use app\models\MotorSearch;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MotorController implements the CRUD actions for Motor model.
 */
class MotorController extends Controller
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
     * Lists all Motor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MotorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Motor model.
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
     * Creates a new Motor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Motor();
        if ($model->load(Yii::$app->request->post())) {
            try{
                if($model->save()){
                    Yii::$app->getSession()->setFlash(
                        'success','Data Motor Tersimpan!'
                    );
                    return $this->redirect(['index']);
                }
            }catch(Exception $e){
                Yii::$app->getSession()->setFlash(
                    'error',"{$e->getMessage()}"
                );
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Motor model.
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
     * Deletes an existing Motor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success',Yii::t('app', 'deleted successfully'));
        return $this->redirect(['index']);
    }

    public function actionExport(){
        $model = Motor::find()->All();
        $filename = 'Data Motor_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA MOTOR</p><br/><br/>
        <p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>
                <th>ID</th>
                <th>WARNA</th>
                <th>NO TOTOK</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>TAHUN</th>
                <th>STATUS</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($model as $data){
            echo '
                <tr>
                    <td>'.$data['id'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['tahun'].'</td>
                    <td>'.$data['status'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';

    }

    public function actionSurabaya(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                INNER JOIN posisi_motor b
                ON a.id = b.id_motor
                INNER JOIN kondisi_motor c
                ON a.id = c.id_motor
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Kantor Surabaya"';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Surabaya_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR <br/> KANTOR SURABAYA </p><br/><br/>
        <p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>
                <th>ID MOTOR</th>
                <th>WARNA</th>
                <th>NO TOTOK</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>POSISI</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>
                    <td>'.$data['id'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['posisi'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionJakarta(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                INNER JOIN posisi_motor b
                ON a.id = b.id_motor
                INNER JOIN kondisi_motor c
                ON a.id = c.id_motor
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Kantor Jakarta"';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();
        $filename = 'Data Stok Jakarta_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR <br/> KANTOR JAKARTA </p><br/><br/>
        <p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>
                <th>ID MOTOR</th>
                <th>WARNA</th>
                <th>NO TOTOK</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>POSISI</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>
                    <td>'.$data['id'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['posisi'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionPabrik(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                INNER JOIN posisi_motor b
                ON a.id = b.id_motor
                INNER JOIN kondisi_motor c
                ON a.id = c.id_motor
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Pabrik"';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();
        $filename = 'Data Stok Pabrik_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR <br/> PABRIK </p><br/><br/>
        <p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>
                <th>ID MOTOR</th>
                <th>WARNA</th>
                <th>NO TOTOK</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>POSISI</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>
                    <td>'.$data['id'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['posisi'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    /**
     * Finds the Motor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Motor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Motor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
