<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\SuratJalan */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

if($model->isNewRecord) {
    $sql = 'SELECT a.id, concat(a.id, " - ", a.tgl, " - ", d.nama, " : ",id_motor, " - ", b.nama, " - ", b.kota) as keterangan
FROM penjualan a
INNER JOIN pembeli b
ON a.id_pembeli = b.id
INNER JOIN motor c
ON a.id_motor = c.id
INNER JOIN jenis_motor d
ON c.id_jenis = d.id
WHERE a.id not in(Select id_penjualan FROM surat_jalan) ORDER by a.id';
} else {
    $sql = 'SELECT a.id, concat(a.id, " - ", a.tgl, " - ", d.nama, " : ",id_motor, " - ", b.nama, " - ", b.kota) as keterangan
FROM penjualan a
INNER JOIN pembeli b
ON a.id_pembeli = b.id
INNER JOIN motor c
ON a.id_motor = c.id
INNER JOIN jenis_motor d
ON c.id_jenis = d.id ORDER by a.id';
}
$penjualan = \app\models\Penjualan::findBySql($sql)->all();
$listData=\yii\helpers\ArrayHelper::map($penjualan,'id','keterangan');


//$listData = \app\models\Penjualan::find()->select(['id', new \yii\db\Expression('CONCAT("id", " model id: ", "tgl") as id')])->all();

?>

<div class="alert alert-block" style="background-color : lightgreen;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Info:</h4>
    <li>Pastikan <b>Data Penjualan</b> sudah terisi sebelumnya sebelum membuat <b>Data Surat Jalan</b>.</li>
    <li><b>Data Penjualan</b> yang tersedia adalah <b>Data Penjualan</b> yang sebelumnya sudah diinputkan dan belum dibuat <b>Data Surat Jalannya</b>.</li>
</div>
<div class="surat-jalan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_penjualan')->dropDownList(
        $listData,
        ['prompt'=>'PILIH DATA PENJUALAN ..']); ?>

    <?= $form->field($model, 'alamat_pengiriman')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'tgl_pengiriman')->widget(
        DatePicker::className(),[
            'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>

    <?= $form->field($model, 'nama_penerima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_pengirim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
