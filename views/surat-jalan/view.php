<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuratJalan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Surat Jalans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-jalan-view">

    <h1>Surat Jalan Atas Nama <?= Html::encode($model->nama_penerima) ?> - <?= Html::encode($model->alamat_pengiriman) ?></h1>

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
            'id_faktur',
            'faktur0.no_faktur',
            'alamat_pengiriman',
            [
                'attribute' => 'tgl_pengiriman',
                'format' => ['date', 'php:d-m-Y']
            ],
            'nama_penerima',
            'nama_pengirim',
            'keterangan:ntext',
            [
                'label'=>'Foto',
                'format'=>'raw',
                'value'=>Html::img(Yii::$app->request->baseUrl.'/uploads/suratjalan/'.$model->foto,
                    ['width'=>'320px']),
            ],
        ],
    ]) ?>

    </div>
    </div>
