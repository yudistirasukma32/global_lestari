<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataFisik */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$sql = 'SELECT a.id, concat(a.id, " - ", a.no_faktur, " - ", date_format(a.tgl, "%d-%m-%Y")) as keterangan
FROM
faktur a
where a.id not in(Select id_faktur FROM data_fisik)';
$faktur = \app\models\Penjualan::findBySql($sql)->all();
$listData=\yii\helpers\ArrayHelper::map($faktur,'id','keterangan');
?>

<div class="data-fisik-form">

    <?php $form = ActiveForm::begin([
        'options' => [ 'enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'id_faktur')->dropDownList(
        $listData,
        ['prompt'=>'PILIH DATA FAKTUR ..']);?>

    <?= $form->field($model, 'foto_ktp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_stnk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foto_bpkb')->fileInput(); ?>

    <?= $form->field($model, 'lainnya')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
