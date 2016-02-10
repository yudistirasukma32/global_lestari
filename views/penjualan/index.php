<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenjualanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Penjualan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= Html::a('Buat Data Penjualan', ['create'], ['class' => 'btn btn-success']) ?>

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!--<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>-->
                Menu
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" style="background:#f1f1f1;">
                <li><a href="chart">Grafik Penjualan Motor</a></li>
                <li><a href="export">Download Data Penjualan Motor</a></li>
            </ul>
        </div>
        <!--
        <div class="col-md-2">
            <p>
                <a href="chart"><button type="button" class="btn btn-primary" style="margin-left: 10px;">
                        <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Grafik Penjualan Motor
                    </button></a>

                <a href="export"><button type="button" class="btn btn-primary" style="margin-left: 10px;">
                        <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Download Data Penjualan Motor
                    </button></a>

            </p>
        </div>-->
        </div>

    <div class="table-responsive">
    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' =>['class' => 'table table-striped table-bordered'],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'jenisMotor0.nama',
                'value' => 'motor0.jenisMotor0.nama',
            ],
//            [
//                'attribute' => 'id_motor',
//                'value' => 'id_motor',
//                'contentOptions'=>['style'=>'width: 75px;'],
//            ],
            [
                'attribute' => 'nama',
                'value' => 'pembeli0.nama',
            ],
            'tipe_pembayaran',
            'harga',
            [
                'attribute'=>'tgl',
                'value'=>'tgl',
                'format'=>'raw',
                'contentOptions'=>['style'=>'width: 150px;'],
                'filter'=>DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'tgl',
                    'clientOptions'=>[
                        'autoclose'=>true,
                        'format'=>'yyyy-mm-dd',
                    ],
                ]),
            ],
            //'keterangan:ntext',
            [
                'attribute' => 'foto_nota',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/uploads/nota/'. $data['foto_nota'],
                        ['width' => '70px']);
                },
            ],
            [
                'attribute' => 'foto_ktp',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').'/uploads/ktp/'. $data['foto_ktp'],
                        ['width' => '70px']);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'update' => function ($url,$model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            $url);
                    },
                ],
            ],
        ],
    ]);

    ?>
</div>
</div>
