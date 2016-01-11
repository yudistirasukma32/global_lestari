<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Faktur */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
if($model->isNewRecord) {
    $sql = 'SELECT e.id, concat("ID Surat Jalan : ", e.id, " - ", e.tgl_pengiriman, " - ", d.nama, " : ",no_totok, " - ", b.nama, " - ", b.kota) as keterangan
FROM
surat_jalan e
INNER JOIN penjualan a
ON e.id_penjualan = a.id
INNER JOIN pembeli b
ON a.id_pembeli = b.id
INNER JOIN motor c
ON a.id_motor = c.id
INNER JOIN jenis_motor d
ON c.id_jenis = d.id
where e.id not in(Select id_surat_jalan FROM faktur)';
} else {
    $sql = 'SELECT e.id, concat("ID Surat Jalan : ", e.id, " - ", e.tgl_pengiriman, " - ", d.nama, " : ",no_totok, " - ", b.nama, " - ", b.kota) as keterangan
FROM
surat_jalan e
INNER JOIN penjualan a
ON e.id_penjualan = a.id
INNER JOIN pembeli b
ON a.id_pembeli = b.id
INNER JOIN motor c
ON a.id_motor = c.id
INNER JOIN jenis_motor d
ON c.id_jenis = d.id';
}
$penjualan = \app\models\Penjualan::findBySql($sql)->all();
$listData=\yii\helpers\ArrayHelper::map($penjualan,'id','keterangan');

?>

<div class="alert alert-block" style="background-color : lightgreen;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Info:</h4>
    <li>Pastikan <b>Data Surat Jalan</b> sudah terisi sebelumnya sebelum membuat <b>Data Faktur</b>.</li>
    <li><b>Data Surat Jalan</b> yang tersedia adalah <b>Data Surat Jalan</b> yang sebelumnya sudah diinputkan dan belum dibuat <b>Data Fakturnya</b>.</li>
</div>
<div class="faktur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_surat_jalan')->dropDownList(
        $listData,
        ['prompt'=>'PILIH DATA SURAT JALAN ..']); ?>

    <?= $form->field($model, 'no_faktur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_penerima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl')->widget(
        DatePicker::className(),[
            'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
