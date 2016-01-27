<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratJalanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Surat Jalan';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

//use app\models\Country;
$no_faktur=\app\models\Faktur::find()->all();
$listData=\yii\helpers\ArrayHelper::map($no_faktur,'id','no_faktur');

?>

<div class="surat-jalan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Surat Jalan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'id_faktur',
            [
                'attribute' => 'no_faktur',
                'value' => 'faktur0.no_faktur',
            ],
            'alamat_pengiriman',
            'tgl_pengiriman',
            'nama_pengirim',
            'nama_penerima',

            // 'keterangan:ntext',
            // 'foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
