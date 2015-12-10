<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataFisikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Fisiks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-fisik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Data Fisik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_faktur',
            'foto_ktp',
            'foto_stnk',
            'foto_bpkb',
            // 'lainnya',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
