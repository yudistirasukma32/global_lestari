<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratJalanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-jalan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_penjualan') ?>

    <?= $form->field($model, 'alamat_pengiriman') ?>

    <?= $form->field($model, 'tgl_pengiriman') ?>

    <?= $form->field($model, 'nama_penerima') ?>

    <?php // echo $form->field($model, 'nama_pengirim') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
