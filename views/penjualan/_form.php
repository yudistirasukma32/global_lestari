<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
if($model->isNewRecord) {
    $sql = 'SELECT a.id, concat(a.id, " - ", " TIPE : ", b.nama, " - ",  a.warna, " - ", a.no_rangka, " - ", a.no_mesin) as warna from motor a INNER JOIN jenis_motor b ON a.id_jenis=b.id INNER JOIN kondisi_motor c ON a.id = c.id_motor where a.status = "belum terjual" AND c.kondisi = "siap jual" ORDER by a.id';
} else {
    $sql = 'SELECT a.id, concat(a.id, " - ", " TIPE : ", b.nama, " - ",  a.warna, " - ", a.no_rangka, " - ", a.no_mesin) as warna from motor a INNER JOIN jenis_motor b ON a.id_jenis=b.id INNER JOIN kondisi_motor c ON a.id = c.id_motor ORDER by a.id';
}
$motor = \app\models\Motor::findBySql($sql)->all();
$listData=\yii\helpers\ArrayHelper::map($motor,'id','warna');

$sql2 = 'SELECT id, concat(id, " - ", nama, " - ", alamat, " - ", kota) as nama from pembeli';
$pembeli = \app\models\Pembeli::findBySql($sql2)->all();
$listData3=\yii\helpers\ArrayHelper::map($pembeli,'id','nama');

?>
<!--<div class="jumbotron" style="background-color : lightgreen;"><b>Info :</b> Data Motor yang tersedia adalah Data Motor dengan kondisi <b>'siap jual'</b> saja.</div>-->

<div class="alert alert-block" style="background-color : lightgreen;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Info:</h4>
    <b>Data Motor</b> yang tersedia adalah <b>Data Motor</b> dengan kondisi <b>'siap jual'</b> saja.
</div>

<div class="penjualan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pembeli')->dropDownList(
        $listData3,
        ['prompt'=>'PILIH DATA PEMBELI ..']); ?>

    <?= $form->field($model, 'id_motor')->dropDownList(
        $listData,
        ['prompt'=>'PILIH DATA MOTOR ..']); ?>
	
    <?= $form->field($model, 'tgl')->widget(
        DatePicker::className(),[
            'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>

    <?= $form->field($model, 'tipe_pembayaran')->dropDownList([ 'tunai' => 'Tunai', 'transfer' => 'Transfer', 'kredit' => 'Kredit', 'lain-lain' => 'Lain-lain', ], ['prompt' => 'PILIH JENIS PEMBAYARAN ..']) ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
