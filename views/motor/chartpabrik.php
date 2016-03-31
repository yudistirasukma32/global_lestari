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
    ->where('id_jenis = 7 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok6 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 16 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok7 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 12 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok8 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 17 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok9 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 14 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok10 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 11 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok11 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 13 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok12 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 18 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok13 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 8 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$stok14 = \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('id_jenis = 15 AND status="Belum Terjual" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

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

$kondisi3 =  \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'kondisi_motor', 'motor.id = kondisi_motor.id_motor')
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('kondisi="Belum Siap" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
    ->all();

$kondisi4 =  \app\models\Motor::find()
    ->select(['COUNT(motor.id) as id'])
    ->join('LEFT JOIN', 'kondisi_motor', 'motor.id = kondisi_motor.id_motor')
    ->join('LEFT JOIN', 'posisi_motor', 'motor.id = posisi_motor.id_motor')
    ->where('kondisi="Rusak" AND posisi = "Pabrik"')
    ->groupBy(['id_jenis'])
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
    foreach($stok4 as $data) {
        $exo = $data['id'];
    }
    foreach($stok5 as $data) {
        $city = $data['id'];
    }
    foreach($stok6 as $data) {
        $dream = $data['id'];
    }
    foreach($stok7 as $data) {
        $focus = $data['id'];
    }
    foreach($stok8 as $data) {
        $jetta = $data['id'];
    }
    foreach($stok9 as $data) {
        $kristal = $data['id'];
    }
    foreach($stok10 as $data) {
        $roda3 = $data['id'];
    }
    foreach($stok11 as $data) {
        $smart = $data['id'];
    }
    foreach($stok12 as $data) {
        $sporty150 = $data['id'];
    }
    foreach($stok13 as $data) {
        $sporty200 = $data['id'];
    }
    foreach($stok14 as $data) {
        $superfix = $data['id'];
    }

    foreach($kondisi1 as $data){
        $siapjual = $data['id'];
    }
    foreach($kondisi2 as $data){
        $sedangdisiapkan = $data['id'];
    }
    foreach($kondisi3 as $data){
        $blmsiap = $data['id'];
    }
    foreach($kondisi4 as $data){
        $rusak = $data['id'];
    }
?>

<div class="row">
    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Grafik Data Stok Motor Pabrik</h3>
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
                                'City One',
                                'Dream D',
                                'Focus',
                                'Jetta',
                                'Kristal',
                                'Roda 3',
                                'Smart',
                                'Sporty 150',
                                'Sporty 200',
                                'Super Fix',
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
                                    ['name' => 'City One','y'=> $city],
                                    ['name' => 'Dream D','y'=> $dream],
                                    ['name' => 'Focus','y'=> $focus],
                                    ['name' => 'Jetta','y'=> $jetta],
                                    ['name' => 'Kristal','y'=> $kristal],
                                    ['name' => 'Roda 3','y'=> $roda3],
                                    ['name' => 'Smart','y'=> $smart],
                                    ['name' => 'Sporty 150','y'=> $sporty150],
                                    ['name' => 'Sporty 200','y'=> $sporty200],
                                    ['name' => 'Super Fix','y'=> $superfix]]
                            ],
                        ]
                    ]
                ]);
                ?>

                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge" style="background-color: dodgerblue;"><?= $bravo; ?></span>
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
                        <span class="badge" style="background-color: #9966ff;"><?= $city; ?></span>
                        City
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: deeppink;"><?= $dream; ?></span>
                        Dream D
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: #cccc00;"><?= $focus; ?></span>
                        Focus
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: mediumaquamarine;"><?= $jetta; ?></span>
                        Jetta
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: #ff5050;"><?= $kristal; ?></span>
                        Kristal
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: lightskyblue;"><?= $roda3; ?></span>
                        Roda 3
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: dodgerblue;"><?= $smart; ?></span>
                        Smart
                    </li>
                    <li class="list-group-item">
                        <span class="badge"><?= $sporty150; ?></span>
                        Sporty 150
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: lightgreen;"><?= $sporty200; ?></span>
                        Sporty 200
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color: darkorange;"><?= $superfix; ?></span>
                        Super Fix
                    </li>

                    <li class="list-group-item">
                        <span class="badge"><?= $bravo+$trooper+$maxi+$exo+$city+$dream+$focus+$jetta+$kristal+$roda3+$smart+$sporty150+$sporty200+$superfix; ?></span>
                        Total
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Grafik Data Kondisi Motor Pabrik</h3>
            </div>
            <div class="panel-body">
                <?= highcharts\HighCharts::widget([
                    'clientOptions' => [
                        'chart' => [
                            'type' => 'pie'
                        ],
                        'title' => [
                            'text' => 'Data Kondisi Stok Motor Beijing Pabrik'
                        ],
                        'tooltip' => [
                            'pointFormat' => '{series.name}: <b>{point.percentage:.1f}%</b> - {point.y} Unit'
                        ],
                        'xAxis' => [
                            'name' => [
                                'Siap Jual',
                                'Sedang disiapkan',
                                'Belum siap',
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
                                    ['name' => 'Sedang disiapkan','y'=> $sedangdisiapkan],
                                    ['name' => 'Belum Siap','y'=> $blmsiap]]
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
                        <span class="badge" style="background-color: lightgreen;"><?= $blmsiap; ?></span>
                        Belum Siap
                    </li>
<!--                    <li class="list-group-item">-->
<!--                        <span class="badge">--><?//= $rusak; ?><!--</span>-->
<!--                        Rusak-->
<!--                    </li>-->
                    <li class="list-group-item">
                        <span class="badge"><?= $siapjual+$sedangdisiapkan+$blmsiap; ?></span>
                        Total
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
