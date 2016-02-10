<?php
/**
 * Created by PhpStorm.
 * User: win 7
 * Date: 1/28/2016
 * Time: 11:27 AM
 */

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\highcharts;


$this->title = 'Grafik Data Motor';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
$stok1 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 1 AND status="Belum Terjual" AND posisi = "Lain-lain"')
    ->groupBy(['id_jenis'])
    ->all();

$stok2 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 2 AND status="Belum Terjual" AND posisi = "Lain-lain"')
    ->groupBy(['id_jenis'])
    ->all();

$stok3 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 3 AND status="Belum Terjual" AND posisi = "Lain-lain"')
    ->groupBy(['id_jenis'])
    ->all();

$stok4 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 4 AND status="Belum Terjual" AND posisi = "Lain-lain"')
    ->groupBy(['id_jenis'])
    ->all();

$stok5 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 5 AND status="Belum Terjual" AND posisi = "Lain-lain"')
    ->groupBy(['id_jenis'])
    ->all();

//$stok1_laku = \app\models\Motor::find()
//    ->select(['COUNT(motor.id) as id'])
//    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
//    ->where('id_jenis = 1 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
//    ->groupBy(['id_jenis'])
//    ->all();
?>

<?php
    foreach($stok1 as $data){
        $bravo = $data['id'];
    }
    foreach($stok2 as $data){
        $trooper = $data['id'];
    }
    foreach($stok3 as $data){
        $maxi = $data['id'];
    }
    foreach($stok4 as $data){
        $exo = $data['id'];
    }
    foreach($stok5 as $data){
        $sco = $data['id'];
    }

?>

<?= highcharts\HighCharts::widget([
    'clientOptions' => [
        'chart' => [
            'type' => 'pie'
        ],
        'title' => [
            'text' => 'Data Stok Motor Beijing Jakarta'
        ],
        'tooltip' => [
            'pointFormat' => '{series.name}: <b>{point.percentage:.1f}%</b> - {point.y} Unit'
        ],
        'xAxis' => [
            'name' => [
                'Bravo',
                'Trooper',
                'Maxi',
                'Exotic',
                'Scootic',

            ]
        ],
        'yAxis' => [
            'title' => [
                'text' => 'Jumlah'
            ]
        ],
        'plotOptions' => [
            'pie' => [
                'showInLegend' => true
            ]
        ],
        'legend'=>[
            'useHTML' => true,
        ],
        'series' => [
            ['name' => 'Stok Tersedia',
             'data' => [
                 ['name' => 'Bravo','y'=> $bravo],
                 ['name' => 'Trooper','y'=> $trooper],
                 ['name' => 'Maxi','y'=> $maxi],
                 ['name' => 'Exotic','y'=> $exo],
                 ['name' => 'Scootic','y'=> $sco]]
            ],
            //['name' => 'Laku', 'data' => [$bravo_laku, 1, 2, 0, 1]],
        ]
    ]
]);
?>
