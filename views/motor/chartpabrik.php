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
    ->where('id_jenis = 1 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok2 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 2 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok3 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 3 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok4 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 4 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok5 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 5 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

//$stok1_laku = \app\models\Motor::find()
//    ->select(['COUNT(motor.id) as id'])
//    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
//    ->where('id_jenis = 1 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
//    ->groupBy(['id_jenis'])
//    ->all();

$kondisi1 =  \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'kondisi_motor', 'motor.id = kondisi_motor.id_motor')
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('kondisi="Siap Jual" AND posisi = "Pabrik"')
    ->groupBy(['kondisi'])
    ->all();

$kondisi2 =  \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'kondisi_motor', 'motor.id = kondisi_motor.id_motor')
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('kondisi="Sedang disiapkan" AND posisi = "Pabrik"')
    ->groupBy(['kondisi'])
    ->all();

/*
$kondisi3 =  \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'kondisi_motor', 'motor.id = kondisi_motor.id_motor')
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('kondisi="Rusak" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();*/

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

    foreach($kondisi1 as $data){
        $siapjual = $data['id'];
    }
    foreach($kondisi2 as $data){
        $sedangdisiapkan = $data['id'];
    }
//    foreach($kondisi3 as $data){
//        $rusak = $data['id'];
//        if($rusak == null){
//            $rusak = 1;
//        }
//    }

?>

<div class="row">
    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Grafik Data Stok Motor Surabaya</h3>
            </div>
            <div class="panel-body">
                <?= highcharts\HighCharts::widget([
                    'clientOptions' => [
                        'chart' => [
                            'type' => 'pie'
                        ],
                        'title' => [
                            'text' => 'Data Stok Motor Beijing Pabrik'
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

                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge" style="background-color: lightskyblue;"><?= $bravo; ?></span>
                        Bravo
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= $trooper; ?></span>
                        Trooper
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: lightgreen;"><?= $maxi; ?></span>
                        Maxi
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: orange;"><?= $exo; ?></span>
                        Exotic
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: rebeccapurple;"><?= $sco; ?></span>
                        Scootic
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= $bravo+$maxi+$sco+$trooper+$exo; ?></span>
                        Total
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Grafik Data Kondisi Motor Surabaya</h3>
            </div>
            <div class="panel-body">
                <?= highcharts\HighCharts::widget([
                    'clientOptions' => [
                        'chart' => [
                            'type' => 'pie'
                        ],
                        'title' => [
                            'text' => 'Data Kondisi Stok Motor Beijing Surabaya'
                        ],
                        'tooltip' => [
                            'pointFormat' => '{series.name}: <b>{point.percentage:.1f}%</b> - {point.y} Unit'
                        ],
                        'xAxis' => [
                            'name' => [
                                'Siap Jual',
                                'Sedang disiapkan',
                                'Rusak',
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
                            ['name' => 'Jumlah',
                                'data' => [
                                    ['name' => 'Siap Jual','y'=> $siapjual],
                                    ['name' => 'Sedang disiapkan','y'=> $sedangdisiapkan]]
//                                    ['name' => 'Rusak','y'=> $rusak]]
                            ],
                            //['name' => 'Laku', 'data' => [$bravo_laku, 1, 2, 0, 1]],
                        ]
                    ]
                ]);
                ?>

                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge" style="background-color: dodgerblue;"><?= $siapjual; ?></span>
                        Siap jual
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= $sedangdisiapkan; ?></span>
                        Sedang disiapkan
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= $siapjual+$sedangdisiapkan; ?></span>
                        Total
                    </li>
                </ul>

            </div>
        </div>
    </div>

</div>

