<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KondisiMotorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kondisi Motor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kondisi-motor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Data Kondisi Motor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'id_motor',
                'value' => 'id_motor',
                'contentOptions'=>['style'=>'width: 75px;'],
            ],
            [
                'attribute' => 'jenisMotor0.nama',
                'value' => 'motor0.jenisMotor0.nama',
            ],
            [
                'attribute' => 'no_totok',
                'value' => 'motor0.no_totok',
                'contentOptions'=>['style'=>'width: 75px;'],
            ],
            [
                'attribute' => 'no_rangka',
                'value' => 'motor0.no_rangka',
            ],
            [
                'attribute' => 'no_mesin',
                'value' => 'motor0.no_mesin',
            ],
            [
                'attribute'=>'kondisi',
                'format'=>'raw',
                'filter' => Html::activeDropDownList($searchModel, 'kondisi', \yii\helpers\ArrayHelper::map(\app\models\KondisiMotor::find()->select('kondisi')->distinct()->all(), 'kondisi','kondisi'),
                    ['class'=>'form-control','prompt' => 'Semua']),
                'value'=>function($row){
                    $values=[
                        'siap jual'=>'success',
                        'sedang disiapkan'=>'info',
                        'belum siap'=>'warning',
                        'rusak'=>'danger',

                    ];
                    return Html::tag('span', $row->kondisi,
                        ['class' => 'label label-'.$values[$row->kondisi].''],
                        ['style'=>'text-size:14px']);
                }],
            'keterangan',

            ['class' => \yii\grid\ActionColumn::className(),'template'=>'{delete} {update}' ],
        ],
    ]); ?>

</div>
