<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */

$this->title = 'Data Penjualan';
$this->params['breadcrumbs'][] = ['label' => 'Penjualan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="penjualan-view">

    <h1><?= Html::encode($this->title) ?> - <?= Html::encode($model->id) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_motor',
            'motor0.no_totok',
            'motor0.no_mesin',
            'motor0.no_totok',
            'id_pembeli',
            'pembeli0.nama',
            [
                'attribute' => 'tgl',
                'format' => ['date', 'php:d-m-Y']
            ],
            'tipe_pembayaran',
            'harga',
            'keterangan:ntext',
            [
                'label'=>'Foto Nota',
                'format'=>'raw',
                'value'=>Html::img(Yii::$app->request->baseUrl.'/uploads/nota/'.$model->foto_nota,
                    ['width'=>'320px']),
            ],
            [
                'label'=>'Foto KTP',
                'format'=>'raw',
                'value'=>Html::img(Yii::$app->request->baseUrl.'/uploads/ktp/'.$model->foto_ktp,
                    ['width'=>'320px']),
            ],
        ],
    ]) ?>

    </div>
    </div>
