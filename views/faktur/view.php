<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Faktur */

$this->title = $model->no_faktur;
$this->params['breadcrumbs'][] = ['label' => 'Fakturs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?
$sql = 'SELECT faktur.id, id_penjualan, nama_penerima, faktur.tgl as tgl_faktur, no_faktur, faktur.keterangan, foto,
jenis_motor.nama as nama, pembeli.nama, penjualan.tgl as tgl_pembelian
FROM faktur
INNER JOIN penjualan
ON faktur.id_penjualan = penjualan.id
INNER JOIN pembeli
ON penjualan.id_pembeli = pembeli.id
INNER JOIN motor
ON penjualan.id_motor = motor.id
INNER JOIN jenis_motor
ON motor.id_jenis = jenis_motor.id';

?>

<div class="faktur-view">

    <h1><?= Html::encode($this->title) ?> Atas Nama <?= Html::encode($model->nama_penerima) ?></h1>

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

    <?= DetailView::widget([

        'model' => $model,
        'attributes' => [
            //'id',
            'id_penjualan',
            'nama_penerima',
            [
                'attribute' => 'tgl_faktur',
                'format' => ['date', 'php:d-m-Y']
            ],
            'no_faktur',
            'keterangan:ntext',
            [
                'label'=>'Foto',
                'format'=>'raw',
                'value'=>Html::img(Yii::$app->request->baseUrl.'/uploads/faktur/'.$model->foto,
                    ['width'=>'320px']),
            ],
        ],
    ]) ?>

</div>
