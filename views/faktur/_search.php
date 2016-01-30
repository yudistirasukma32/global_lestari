<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FakturSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<h3>Cari Faktur</h3>
<div class="faktur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<!---->
<!--    --><?php //echo $form->field($model, 'id') ?>
<!---->
<!--    --><?php //echo $form->field($model, 'id_penjualan') ?>
<!---->
<!--    --><?php //echo $form->field($model, 'nama_penerima') ?>
    <?= $form->field($model, 'no_faktur') ?>
    <?= $form->field($model, 'tgl_faktur') ?>
    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
    <hr/>

    <?php ActiveForm::end(); ?>

</div>
