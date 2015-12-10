<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

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
            'no_faktur',
            'id_surat_jalan',
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
            'nama_penerima',
            'keterangan:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
