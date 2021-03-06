<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PosisiMotorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posisi Motor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posisi-motor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Data Posisi Motor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="table-responsive">
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
                'filter' => Html::activeDropDownList($searchModel, 'nama', \yii\helpers\ArrayHelper::map(\app\models\JenisMotor::find()->select('nama')->distinct()->all(), 'nama','nama'),
                    ['class'=>'form-control','prompt' => 'Semua']),
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
                'attribute'=>'posisi',
                'format'=>'raw',
                'filter' => Html::activeDropDownList($searchModel, 'posisi', \yii\helpers\ArrayHelper::map(\app\models\PosisiMotor::find()->select('posisi')->distinct()->all(), 'posisi','posisi'),
                    ['class'=>'form-control','prompt' => 'Semua']),
                'value'=>function($row){
                    $values=[
                        'Kantor Surabaya'=>'success',
                        'Kantor Jakarta'=>'info',
                        'Pabrik'=>'warning',
                        'Lain-lain'=>'default',

                    ];
                    return Html::tag('span', $row->posisi,
                        ['class' => 'label label-'.$values[$row->posisi].''],
                        ['style'=>'text-size:14px']);
                }],
            'keterangan:ntext',

            ['class' => \yii\grid\ActionColumn::className(),'template'=>'{delete} {update}' ],
        ],
    ]); ?>
</div>
</div>
