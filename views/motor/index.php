<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MotorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Motor';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

//use app\models\Country;
$jenismotor=\app\models\JenisMotor::find()->all();
$listData=\yii\helpers\ArrayHelper::map($jenismotor,'id','nama');

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
                   <!-- <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Download Data Stok Motor <span class="caret"></span>
                        </button>
                </div>-->
                </td>
            <td>

                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Download Stok Surabaya
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" style="background:#f1f1f1;">
                            <li><a href="surabaya-bravo">BEIJING BRAVO M/T 100cc</a></li>
                            <li><a href="surabaya-trooper">BEIJING TROOPER M/T 200cc</a></li>
                            <li><a href="surabaya-maxi">BEIJING MAXI M/T 125cc</a></li>
                            <li><a href="surabaya-exotic">BEIJING EXOTIC A/T 125cc</a></li>
                            <li><a href="surabaya-scootic">BEIJING SCOOTIC A/T 125cc</a></li>

                            <!--<li><a href="surabaya-sporty">BEIJING SPORTY M/T 200cc</a></li>-->
                            <li><a href="surabaya-city">BEIJING CITY ONE M/T 150cc</a></li>
                            <li><a href="surabaya-exel">BEIJING EXEL</a></li>
                            <li><a href="surabaya-roda-3">BEIJING RODA 3</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group" >
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Download Stok Jakarta
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" style="background:#f1f1f1;">
                            <li><a href="jakarta-bravo">BEIJING BRAVO M/T 100cc</a></li>
                            <li><a href="jakarta-trooper">BEIJING TROOPER M/T 200cc</a></li>
                            <li><a href="jakarta-maxi">BEIJING MAXI M/T 125cc</a></li>
                            <li><a href="jakarta-exotic">BEIJING EXOTIC A/T 125cc</a></li>
                            <li><a href="jakarta-scootic">BEIJING SCOOTIC A/T 125cc</a></li>

                            <li><a href="jakarta-sporty">BEIJING SPORTY M/T 200cc</a></li>
                            <li><a href="jakarta-city">BEIJING CITY ONE M/T 150cc</a></li>
                            <li><a href="jakarta-exel">BEIJING EXEL</a></li>
                            <li><a href="jakarta-roda-3">BEIJING RODA 3</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Download Stok Pabrik
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" style="background:#f1f1f1;">
                            <li><a href="pabrik-bravo">BEIJING BRAVO M/T 100cc</a></li>
                            <li><a href="pabrik-trooper">BEIJING TROOPER M/T 200cc</a></li>
                            <li><a href="pabrik-maxi">BEIJING MAXI M/T 125cc</a></li>
                            <li><a href="pabrik-exotic">BEIJING EXOTIC A/T 125cc</a></li>
                            <li><a href="pabrik-scootic">BEIJING SCOOTIC A/T 125cc</a></li>

                            <li><a href="pabrik-sporty">BEIJING SPORTY M/T 200cc</a></li>
                            <li><a href="pabrik-city">BEIJING CITY ONE M/T 150cc</a></li>
                            <li><a href="pabrik-exel">BEIJING EXEL</a></li>
                            <li><a href="pabrik-roda-3">BEIJING RODA 3</a></li>

                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Grafik Stok Motor
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" style="background:#f1f1f1;">
                            <li><a href="chart">Kantor Surabaya</a></li>
                            <li><a href="chart-jakarta">Kantor Jakarta</a></li>
                            <li><a href="chart-pabrik">Pabrik</a></li>
                            <!--<li><a href="chart-jkt">Kantor Jakarta</a></li>
                            <li><a href="chart-pabrik">Pabrik</a></li>-->
                        </ul>
                    </div>
                </div>
            </td>


        </tr>
        </table><br/>
        <!--Html::a('Download Data Motor', ['export'], ['class' => 'btn btn-info'])-->

        <?php
        $form = \yii\bootstrap\ActiveForm::begin();

        /* parameterized initialization */
        $form = \yii\bootstrap\ActiveForm::begin([
        'id' => 'form_id',
        'options' => [
        'class' => 'form_class',
        'enctype' => 'multipart/form-data',
        ],
        ]);
        //render form elements here
        \yii\bootstrap\ActiveForm::end();
        ?>

    </div>
    <div class="table-responsive">
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
</div>
