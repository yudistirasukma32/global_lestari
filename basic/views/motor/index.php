<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MotorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Motor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p></p>
        <table>
        <tr>
            <td><?= Html::a('Buat Data Motor', ['create'], ['class' => 'btn btn-success']) ?></td>
            <td style="padding-left:10px;"><div class="btn-group">

                    <!-- Single button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Download Data Stok Motor <span class="caret"></span>
                        </button>
                    <ul class="dropdown-menu">
                        <li><a href="surabaya">Data Stok Surabaya</a></li>
                        <li><a href="jakarta">Data Stok Jakarta</a></li>
                        <li><a href="pabrik">Data Stok Pabrik</a></li>
                        <!--<li role="separator" class="divider"></li>
                        <li><a href="#">#</a></li>-->
                    </ul>
                </div></td>
        </tr>
        </table><br/>
        <!--Html::a('Download Data Motor', ['export'], ['class' => 'btn btn-info'])-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'value' => 'id',
                'contentOptions'=>['style'=>'width: 75px;'],
            ],
            [
                'attribute' => 'nama',
                'value' => 'jenisMotor0.nama',
            ],
            [
                'attribute' => 'warna',
                'value' => 'warna',
                'contentOptions'=>['style'=>'width: 125px;'],
            ],
            [
                'attribute' => 'no_totok',
                'value' => 'no_totok',
                'contentOptions'=>['style'=>'width: 75px;'],
            ],
            'no_rangka',
            'no_mesin',
            [
                'attribute' => 'posisi',
                'value' => 'posisiMotor0.posisi',
                //'contentOptions'=>['style'=>'width: 130px;'],
                'filter' => Html::activeDropDownList($searchModel, 'posisi', \yii\helpers\ArrayHelper::map(\app\models\PosisiMotor::find()->select('posisi')->distinct()->all(), 'posisi','posisi'),
                    ['class'=>'form-control','prompt' => 'Semua']),
            ],
            // 'tahun',
            // 'id_jenis',
            [
                'attribute'=>'status',
                'format'=>'raw',
                'filter' => Html::activeDropDownList($searchModel, 'status', \yii\helpers\ArrayHelper::map(\app\models\Motor::find()->select('status')->distinct()->all(), 'status','status'),
                    ['class'=>'form-control','prompt' => 'Semua']),
                'value'=>function($row){
                    $values=[
                        'laku'=>'success',
                        'belum terjual'=>'info',
                    ];
                    return Html::tag('span', $row->status,
                        ['class' => 'label label-'.$values[$row->status].''],
                        ['style'=>'text-size:14px']);
                }],
            //'keterangan',

            ['class' => \yii\grid\ActionColumn::className(),'template'=>'{delete} {update}' ],
        ],
    ]);

    ?>


</div>
