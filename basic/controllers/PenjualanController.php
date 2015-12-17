<?php

namespace app\controllers;

use app\models\Motor;
use Yii;
use app\models\Penjualan;
use app\models\PenjualanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * PenjualanController implements the CRUD actions for Penjualan model.
 */
class PenjualanController extends Controller
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
     * Lists all Penjualan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenjualanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Penjualan model.
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
     * Creates a new Penjualan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penjualan();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //var_dump($model);

            $id_pembeli = $model->id_pembeli;
            $id_motor = $model->id_motor;
            $id_penjualan = $this->id;
            $user = Yii::$app->user->identity->username;

           //$id_motor = Yii::$app->request->post(id_motor);
            Yii::$app->db->createCommand('UPDATE motor SET status="laku" WHERE id='.$id_motor)
                ->execute();
            Yii::$app->db->createCommand('UPDATE posisi_motor SET posisi="Lain-lain" WHERE id_motor='.$id_motor)
                ->execute();
            Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Insert data penjualan dengan id : '.$id_penjualan.' // oleh user : '.$user.'")')
                ->execute();
            return $this->redirect(['view', 'id' => $model->id]);

        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Penjualan model.
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
     * Deletes an existing Penjualan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $user = Yii::$app->user->identity->username;
        $this->findModel($id)->delete();
        Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Delete data penjualan dengan id : '.$id.' //  oleh user : '.$user.'")')
            ->execute();

        return $this->redirect(['index']);
    }

    public function actionExport(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT a.id, a.id_motor, a.id_pembeli, d.nama as jenis_motor, c.no_totok,
                c.no_rangka, c.no_mesin, c.warna, b.nama as pembeli, DATE_FORMAT(a.tgl,"%d/%m/%Y") as tgl,
                a.tipe_pembayaran, a.harga, f.no_faktur
                FROM penjualan a
                INNER JOIN pembeli b
                ON a.id_pembeli = b.id
                INNER JOIN motor c
                ON a.id_motor = c.id
                INNER JOIN jenis_motor d
                ON c.id_jenis = d.id
                INNER JOIN surat_jalan e
                ON a.id = e.id_penjualan
                INNER JOIN faktur f
                ON e.id = f.id_surat_jalan';
        //$model = Penjualan::findBySql($sql)->all();
        $model = $connection->createCommand($sql);
        $penjualan = $model->queryAll();

        $query = (new \yii\db\Query())->from('penjualan');
        $sum = $query->sum('harga');


        //var_dump($model);
        //$model = Motor::find()->All();
        $filename = 'Data Penjualan Motor_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA PENJUALAN MOTOR</p><br/><br/>
        <p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>
                <th>ID</th>
                <th>JENIS MOTOR</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>PEMBELI</th>
                <th>TANGGAL</th>
                <th>PEMBAYARAN</th>
                <th>FAKTUR</th>
                <th>HARGA (Rp.)</th>
            </tr>
        </thead>';
        foreach($penjualan as $data){
            echo '
                <tr>
                    <td>'.$data['id'].'</td>
                    <td>'.$data['jenis_motor'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['pembeli'].'</td>
                    <td>'.$data['tgl'].'</td>
                    <td>'.$data['tipe_pembayaran'].'</td>
                    <td>'.$data['no_faktur'].'</td>
                    <td style="text-align:right;"> '.$data['harga'].'</td>
                </tr>

            ';
        }

        echo '  <tr>
                    <td colspan="9">Total</td>
                    <td style="text-align:right;">'.$sum.'</td>
                </tr>
                </table>';

    }


    /**
     * Finds the Penjualan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penjualan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penjualan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
