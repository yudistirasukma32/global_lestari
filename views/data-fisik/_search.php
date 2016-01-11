<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataFisikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-fisik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_faktur') ?>

    <?= $form->field($model, 'foto_ktp') ?>

    <?= $form->field($model, 'foto_stnk') ?>

    <?= $form->field($model, 'foto_bpkb') ?>

    <?php // echo $form->field($model, 'lainnya') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
