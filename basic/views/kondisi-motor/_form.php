<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KondisiMotor */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

//use app\models\Country;
$motor=\app\models\Motor::find()->where(['status' => 'belum terjual'])->all();
$listData=\yii\helpers\ArrayHelper::map($motor,'id','no_rangka','no_mesin');

?>

<?php
if($model->isNewRecord){
$sql = 'SELECT a.id, concat(a.id, " - ", " TIPE : ", b.nama, " - ",  a.warna, " - ", a.no_rangka, " - ", a.no_mesin) as warna from motor a INNER JOIN jenis_motor b ON a.id_jenis=b.id where a.status = "belum terjual" AND a.id not in(SELECT id_motor from kondisi_motor)';
} else {
$sql = 'SELECT a.id, concat(a.id, " - ", " TIPE : ", b.nama, " - ",  a.warna, " - ", a.no_rangka, " - ", a.no_mesin) as warna from motor a INNER JOIN jenis_motor b ON a.id_jenis=b.id where a.status = "belum terjual"';
}
$motor = \app\models\Motor::findBySql($sql)->all();
$listData=\yii\helpers\ArrayHelper::map($motor,'id','warna');

?>
<div class="alert alert-block" style="background-color : lightgreen;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Info:</h4>
    <b>Data Motor</b> yang tersedia adalah <b>Data Motor</b> yang belum pernah diinputkan <b>Data Kondisinya</b>.
</div>
<div class="kondisi-motor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_motor')->dropDownList(
        $listData,
        ['prompt'=>'PILIH DATA MOTOR ..']); ?>

    <?= $form->field($model, 'kondisi')->dropDownList([ 'siap jual' => 'Siap jual', 'sedang disiapkan' => 'Sedang disiapkan', 'belum siap' => 'Belum siap', 'rusak' => 'Rusak', ], ['prompt' => 'PILIH KONDISI MOTOR']) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
