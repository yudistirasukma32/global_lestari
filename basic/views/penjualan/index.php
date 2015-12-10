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

    <p>
        <?= Html::a('Buat Data Penjualan', ['create'], ['class' => 'btn btn-success']) ?>

        <a href="export"><button type="button" class="btn btn-primary" style="margin-left: 10px;">
            <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Download Data Penjualan Motor
        </button></a>
    </p>

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
            'id_motor',
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
            'keterangan:ntext',

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
