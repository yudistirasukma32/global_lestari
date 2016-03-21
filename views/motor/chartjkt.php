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
    ->where('id_jenis = 1 AND status="Belum Terjual" AND posisi = "Kantor Jakarta"')
    ->groupBy(['id_jenis'])
    ->all();

$stok2 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 2 AND status="Belum Terjual" AND posisi = "Kantor Jakarta"')
    ->groupBy(['id_jenis'])
    ->all();

$stok3 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 3 AND status="Belum Terjual" AND posisi = "Kantor Jakarta"')
    ->groupBy(['id_jenis'])
    ->all();

$stok4 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 4 AND status="Belum Terjual" AND posisi = "Kantor Jakarta"')
    ->groupBy(['id_jenis'])
    ->all();

$stok5 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 5 AND status="Belum Terjual" AND posisi = "Kantor Jakarta"')
    ->groupBy(['id_jenis'])
    ->all();

$stok7 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 7 AND status="Belum Terjual" AND posisi = "Kantor Jakarta"')
    ->groupBy(['id_jenis'])
    ->all();

$stok8 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 8 AND status="Belum Terjual" AND posisi = "Kantor Jakarta"')
    ->groupBy(['id_jenis'])
    ->all();

$stok10 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 10 AND status="Belum Terjual" AND posisi = "Kantor Jakarta"')
    ->groupBy(['id_jenis'])
    ->all();

$stok11 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 11 AND status="Belum Terjual" AND posisi = "Kantor Jakarta"')
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
    ->where('kondisi="Siap Jual" AND posisi = "Kantor Jakarta"')
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
    foreach($stok10 as $data){
        $exel = $data['id'];
    }
    foreach($stok11 as $data){
        $roda = $data['id'];
    }

foreach($kondisi1 as $data){
    $siapjual = $data['id'];
}

?>
<div class="row">
    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Grafik Data Stok Motor Jakarta</h3>
            </div>
            <div class="panel-body">
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
                'City One',
                'Sporty',
                'Exel',
                'Roda 3',

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
                 ['name' => 'Sporty','y'=> $sporty],
                 ['name' => 'Exel','y'=> $exel],
                 ['name' => 'Roda 3','y'=> $roda]]
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
                        <span class="badge" style="background-color: darkcyan;"><?= $exel; ?></span>
                        Exel
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: #FF3333 ;"><?= $roda; ?></span>
                        Roda 3
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= $bravo+$maxi+$sco+$trooper+$exo+$sporty+$city+$exel+$roda; ?></span>
                        Total
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Grafik Data Kondisi Motor Jakarta</h3>
            </div>
            <div class="panel-body">
                <?= highcharts\HighCharts::widget([
                    'clientOptions' => [
                        'chart' => [
                            'type' => 'pie'
                        ],
                        'title' => [
                            'text' => 'Data Kondisi Stok Motor Beijing Jakarta'
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
                                    ['name' => 'Siap Jual','y'=> $siapjual]],
                                   // ['name' => 'Sedang disiapkan','y'=> $sedangdisiapkan]]
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
<!--                    <li class="list-group-item">-->
<!--                        <span class="badge">--><?//= $sedangdisiapkan; ?><!--</span>-->
<!--                        Sedang disiapkan-->
<!--                    </li>-->
                    <li class="list-group-item">
                        <span class="badge"><?= $siapjual; ?></span>
                        Total
                    </li>
                </ul>

            </div>
        </div>
    </div>

</div>
