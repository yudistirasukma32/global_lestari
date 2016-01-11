<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratJalanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Surat Jalan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-jalan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Data Surat Jalan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_penjualan',
            'alamat_pengiriman',
            [
                'attribute'=>'tgl_pengiriman',
                'value'=>'tgl_pengiriman',
                'format'=>'raw',
                'contentOptions'=>['style'=>'width: 150px;'],
                'filter'=>DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'tgl_pengiriman',
                    'clientOptions'=>[
                        'autoclose'=>true,
                        'format'=>'yyyy-mm-dd',
                    ],
                ]),
            ],
            'nama_penerima',
            'nama_pengirim',
            'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
