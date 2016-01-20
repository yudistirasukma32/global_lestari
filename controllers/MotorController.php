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

        $model = new Motor();

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
        $user = Yii::$app->user->identity->username;


        if ($model->load(Yii::$app->request->post())) {
            try{
                if($model->save()){

                    $id_motor = $model->id;
                    $no_totok = $model->no_totok;
                    $no_mesin = $model->no_mesin;
                    $no_rangka= $model->no_rangka;

                    Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Insert data motor id : '.$id_motor.' - No Mesin : '.$no_mesin.' - No Rangka : '.$no_rangka.' - No Totok : '.$no_totok.'// oleh user : '.$user.'")')
                        ->execute();

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
        //$id = $model->id;
        $user = Yii::$app->user->identity->username;

        Yii::$app->db->createCommand('insert into logs (date, logs) VALUES (now(),"Delete data Motor id : '.$id.' // oleh user : '.$user.'")')
            ->execute();

        Yii::$app->session->setFlash('success',Yii::t('app', 'Data Motor Dihapus!'));
        return $this->redirect(['index']);
    }

    /**
     *  Print Data Stok Motor SURABAYA
     *
     * */

    public function actionSurabayaBravo(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                INNER JOIN posisi_motor b
                ON a.id = b.id_motor
                INNER JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Kantor Surabaya" AND
                d.nama LIKE "%BRAVO%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Bravo_Surabaya_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR BRAVO<br/> KANTOR SURABAYA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionSurabayaTrooper(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                INNER JOIN posisi_motor b
                ON a.id = b.id_motor
                INNER JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Kantor Surabaya" AND
                d.nama LIKE "%TROOPER%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Trooper_Surabaya_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR TROOPER<br/> KANTOR SURABAYA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionSurabayaMaxi(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                INNER JOIN posisi_motor b
                ON a.id = b.id_motor
                INNER JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Kantor Surabaya" AND
                d.nama LIKE "%MAXI%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Maxi_Surabaya_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR MAXI<br/> KANTOR SURABAYA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionSurabayaExotic(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                INNER JOIN posisi_motor b
                ON a.id = b.id_motor
                INNER JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Kantor Surabaya" AND
                d.nama LIKE "%Exotic%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Exotic_Surabaya_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR EXOTIC<br/> KANTOR SURABAYA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionSurabayaScootic(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                INNER JOIN posisi_motor b
                ON a.id = b.id_motor
                INNER JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Kantor Surabaya" AND
                d.nama LIKE "%Scootic%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Scootic_Surabaya_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR SCOOTIC<br/> KANTOR SURABAYA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    /*public function actionSurabayaArjuna(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                INNER JOIN posisi_motor b
                ON a.id = b.id_motor
                INNER JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Kantor Surabaya" AND
                d.nama LIKE "%ARJUNA%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Jrd_Arjuna_Surabaya_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR JRD ARJUNA<br/> KANTOR SURABAYA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    */
    /**
     *  Print Data Stok Motor PABRIK
     *
     * */

    public function actionPabrikBravo(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                LEFT JOIN posisi_motor b
                ON a.id = b.id_motor
                LEFT JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Lain-lain" AND
                d.nama LIKE "%BRAVO%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Bravo_Pabrik_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR BRAVO<br/> PABRIK </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionPabrikTrooper(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                LEFT JOIN posisi_motor b
                ON a.id = b.id_motor
                LEFT JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Lain-lain" AND
                d.nama LIKE "%TROOPER%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Trooper_Pabrik_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR TROOPER<br/> PABRIK </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionPabrikMaxi(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                LEFT JOIN posisi_motor b
                ON a.id = b.id_motor
                LEFT JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Lain-lain" AND
                d.nama LIKE "%MAXI%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Maxi_Pabrik_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR MAXI<br/> PABRIK </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionPabrikExotic(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                LEFT JOIN posisi_motor b
                ON a.id = b.id_motor
                LEFT JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Lain-lain" AND
                d.nama LIKE "%EXOTIC%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Exotic_Pabrik_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR EXOTIC<br/> PABRIK </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionPabrikScootic(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                INNER JOIN posisi_motor b
                ON a.id = b.id_motor
                INNER JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Lain-lain" AND
                d.nama LIKE "%SCOOTIC%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Scootic_Pabrik_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR SCOOTIC<br/> PABRIK </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    /**
     *  Print Data Stok Motor Jakarta
     *
     * */

    public function actionJakartaBravo(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                LEFT JOIN posisi_motor b
                ON a.id = b.id_motor
                LEFT JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Lain-lain" AND
                d.nama LIKE "%BRAVO%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Bravo_Jakarta_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR BRAVO<br/> KANTOR JAKARTA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionJakartaTrooper(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                LEFT JOIN posisi_motor b
                ON a.id = b.id_motor
                LEFT JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Lain-lain" AND
                d.nama LIKE "%TROOPER%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Trooper_Jakarta_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR TROOPER<br/> KANTOR JAKARTA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionJakartaMaxi(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                LEFT JOIN posisi_motor b
                ON a.id = b.id_motor
                LEFT JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Lain-lain"  AND
                d.nama LIKE "%MAXI%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Maxi_Jakarta_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR MAXI<br/> KANTOR JAKARTA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionJakartaExotic(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                LEFT JOIN posisi_motor b
                ON a.id = b.id_motor
                LEFT JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Lain-lain" AND
                d.nama LIKE "%EXOTIC%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Exotic_Jakarta_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR EXOTIC<br/> KANTOR JAKARTA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
                    <td>'.$data['kondisi'].'</td>
                    <td>'.$data['keterangan'].'</td>
                </tr>
            ';
        }
        echo '</table>';
    }

    public function actionJakartaScootic(){
        $connection = \Yii::$app->db;
        $sql = 'SELECT d.nama, a.id, a.warna, a.no_totok, a.no_rangka, a.no_mesin, b.posisi, c.kondisi,
                concat(b.keterangan, " - ", c.keterangan) as keterangan  FROM motor a
                LEFT JOIN posisi_motor b
                ON a.id = b.id_motor
                LEFT JOIN kondisi_motor c
                ON a.id = c.id_motor
                INNER JOIN jenis_motor d
                ON a.id_jenis = d.id
                WHERE a.status = "Belum terjual" AND
                b.posisi = "Lain-lain" AND
                d.nama LIKE "%SCOOTIC%"
                ORDER by d.nama,a.no_totok';

        $model = $connection->createCommand($sql);
        $sby = $model->queryAll();

        $filename = 'Data Stok Scootic_Jakarta_'.Date('YmdGis').'.xls';
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        echo '<table border="1" width="100%">
        <p style="text-align: center;">LAPORAN DATA STOK MOTOR SCOOTIC<br/> KANTOR JAKARTA </p><br/><br/>
        <p>';
        echo '</p><p>';

        echo '</p><p>';
        echo date('d/m/Y');
        echo'</p>
        <thead>
            <tr>

                <th>ID MOTOR</th>
                <th>NO TOTOK</th>
                <th>WARNA</th>
                <th>NO RANGKA</th>
                <th>NO MESIN</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>';
        foreach($sby as $data){
            echo '
                <tr>

                    <td>'.$data['id'].'</td>
                    <td>'.$data['no_totok'].'</td>
                    <td>'.$data['warna'].'</td>
                    <td>'.$data['no_rangka'].'</td>
                    <td>'.$data['no_mesin'].'</td>
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
