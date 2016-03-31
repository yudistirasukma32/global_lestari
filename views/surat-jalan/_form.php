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
    $sql = 'SELECT a.id, concat(a.no_faktur, " - ", a.nama_penerima, " - ", a.tgl_faktur) as keterangan
FROM faktur a
INNER JOIN penjualan b
ON a.id_penjualan = b.id
INNER JOIN pembeli c
ON b.id_pembeli = c.id
INNER JOIN motor d
ON b.id_motor = d.id
INNER JOIN jenis_motor e
ON d.id_jenis = e.id
WHERE a.id not in(Select id_faktur FROM surat_jalan) ORDER by a.id';
} else {
    $sql = 'SELECT a.id, concat(a.no_faktur, " - ", a.nama_penerima, " - ", a.tgl_faktur) as keterangan
FROM faktur a
INNER JOIN penjualan b
ON a.id_penjualan = b.id
INNER JOIN pembeli c
ON b.id_pembeli = c.id
INNER JOIN motor d
ON b.id_motor = d.id
INNER JOIN jenis_motor e
ON d.id_jenis = e.id ORDER by a.id';
}
$penjualan = \app\models\Penjualan::findBySql($sql)->all();
$listData=\yii\helpers\ArrayHelper::map($penjualan,'id','keterangan');
?>


<div class="surat-jalan-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'id_faktur')->dropDownList(
        $listData,
        ['prompt'=>'PILIH DATA FAKTUR ..']); ?>

    <?= $form->field($model, 'alamat_pengiriman')->textInput(['maxlength' => true]) ?>

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

    <hr/>

    <?= $form->field($model, 'nama_pengirim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'foto')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
