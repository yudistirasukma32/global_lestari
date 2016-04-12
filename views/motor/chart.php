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
    ->where('id_jenis = 1 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok2 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 2 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok3 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 3 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok4 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 4 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok5 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 5 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok7 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 7 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok8 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 8 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok9 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 9 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok10 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 10 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok11 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 11 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok12 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 12 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok13 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 13 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok14 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 14 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok15 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 15 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok16 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 16 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok19 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 19 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok20 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 20 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$stok21 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 6 AND status="Belum Terjual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['id_jenis'])
    ->all();

$kondisi1 =  \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'kondisi_motor', 'motor.id = kondisi_motor.id_motor')
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('kondisi="Siap Jual" AND posisi = "Kantor Surabaya"')
    ->groupBy(['kondisi'])
    ->all();

$kondisi2 =  \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'kondisi_motor', 'motor.id = kondisi_motor.id_motor')
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('kondisi="Sedang disiapkan" AND posisi = "Kantor Surabaya"')
    ->groupBy(['kondisi'])
    ->all();
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
    foreach($stok7 as $data){
    $city = $data['id'];
}
    foreach($stok8 as $data){
        $sporty = $data['id'];
    }
    foreach($stok9 as $data){
    $bla = $data['id'];
}
    foreach($stok10 as $data){
        $exel = $data['id'];
    }
    foreach($stok11 as $data){
        $roda = $data['id'];
    }
    foreach($stok12 as $data){
        $focus = $data['id'];
    }
    foreach($stok13 as $data){
        $smart = $data['id'];
    }
    foreach($stok14 as $data){
        $kristal = $data['id'];
    }
    foreach($stok15 as $data){
        $superfix = $data['id'];
    }
    foreach($stok16 as $data){
        $dream = $data['id'];
    }
//    foreach($stok19 as $data){
//        $newsuper = $data['id'];
//    }
    foreach($stok20 as $data){
        $bmx = $data['id'];
    }
    foreach($stok21 as $data){
        $jrd = $data['id'];
    }

    foreach($kondisi1 as $data){
        $siapjual = $data['id'];
    }
    foreach($kondisi2 as $data){
        $sedangdisiapkan = $data['id'];
    }
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
                            'text' => 'Data Stok Motor Beijing Surabaya'
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
                                'City One',
                                'Sporty 200',
                                'Blazer',
                                'Exel',
                                'Focus',
                                'Smart',
                                'Kristal',
                                'Super Fix',
                                'Dream D',
//                                'New Super Fix',
                                'BMX',
                                'JRD Arjuna'
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
                                    ['name' => 'Scootic','y'=> $sco],
                                    ['name' => 'City One','y'=> $city],
                                    ['name' => 'Sporty 200','y'=> $sporty],
                                    ['name' => 'Blazer','y'=> $bla],
                                    ['name' => 'Exel','y'=> $exel],
                                    ['name' => 'Focus','y'=> $focus],
                                    ['name' => 'Smart','y'=> $smart],
                                    ['name' => 'Kristal','y'=> $kristal],
                                    ['name' => 'Super Fix','y'=> $superfix],
                                    ['name' => 'Dream D','y'=> $dream],
                                    ['name' => 'JRD','y'=> $jrd],
//                                    ['name' => 'New Super Fix','y'=> $newsuper],
                                    ['name' => 'BMX','y'=> $bmx]],
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
                        <span class="badge" style="background-color: sandybrown;"><?= $exo; ?></span>
                        Exotic
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: mediumpurple;"><?= $sco; ?></span>
                        Scootic
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: deeppink;"><?= $city; ?></span>
                        City One
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: #ccd232;"><?= $sporty; ?></span>
                        Sporty
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: lightseagreen;"><?= $bla; ?></span>
                        Blazer
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: #ff0055;"><?= $exel; ?></span>
                        Exel
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: lightsteelblue;"><?= $focus; ?></span>
                        Focus
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: cornflowerblue;"><?= $smart; ?></span>
                        Smart
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= $kristal; ?></span>
                        Kristal
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: lightgreen;"><?= $superfix; ?></span>
                        Super Fix
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: sandybrown;"><?= $dream; ?></span>
                        Dream D
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: mediumpurple;"><?= $jrd; ?></span>
                        JRD Arjuna
                    </li>
<!--                    <li class="list-group-item">-->
<!--                        <span class="badge" style="background-color: deeppink;">--><?//= $newsuper; ?><!--</span>-->
<!--                        New Super Fix-->
<!--                    </li>-->
                    <li class="list-group-item">
                        <span class="badge" style="background-color: #ccd232;"><?= $bmx; ?></span>
                        BMX
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= $bravo+$maxi+$sco+$trooper+$exo+$exel+$bla+$sporty+$city+$focus+$smart+$bmx+$jrd+$dream+$superfix+$kristal; ?></span>
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
//                                  ['name' => 'Rusak','y'=> $rusak]]
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

