<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penjualans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="penjualan-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id',
            'id_motor',
            'id_pembeli',
            'tgl',
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
