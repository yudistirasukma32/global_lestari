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
    $sql = 'SELECT a.id, concat(a.id, " - ", a.tgl, " - ", d.nama, " : ",id_motor, " - ", b.nama, " - ", b.kota) as keterangan
FROM penjualan a
INNER JOIN pembeli b
ON a.id_pembeli = b.id
INNER JOIN motor c
ON a.id_motor = c.id
INNER JOIN jenis_motor d
ON c.id_jenis = d.id
WHERE a.id not in(Select id_penjualan FROM faktur) ORDER by a.id';
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
?>

<div class="faktur-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'id_penjualan')->dropDownList(
        $listData,
        ['prompt'=>'PILIH DATA PENJUALAN ..']); ?>

    <?= $form->field($model, 'nama_penerima')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_faktur')->widget(
        DatePicker::className(),[
            'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>

    <?= $form->field($model, 'no_faktur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'foto')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
