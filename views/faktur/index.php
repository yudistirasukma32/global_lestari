<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FakturSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Faktur';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faktur-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Data Faktur', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'id_penjualan',
            'no_faktur',
            'nama_penerima',
            'tgl',
            [
                'attribute' => 'Jenis Motor',
                'value' => 'penjualan0.motor0.jenisMotor0.nama',
            ],
            [
                'attribute' => 'Nama Pembeli',
                'value' => 'penjualan0.pembeli0.nama',
            ],
            [
                'attribute' => 'Tgl Penjualan',
                'value' => 'penjualan0.tgl',
            ],
            //'keterangan:ntext',
            //'foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
