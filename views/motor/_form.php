<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Motor */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

//use app\models\Country;
$jenismotor=\app\models\JenisMotor::find()->all();
$listData=\yii\helpers\ArrayHelper::map($jenismotor,'id','nama');

?>
<div class="alert alert-block" style="background-color : lightgreen;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Info:</h4>
    <li>Pastikan Setelah Input <b>Data Motor</b>, Input juga <b>Data Posisi</b> dan <b>Data Kondisi</b> Motor.
</div>
<div class="motor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jenis')->dropDownList(
        $listData,
        ['prompt'=>'PILIH JENIS MOTOR ..']); ?>

    <?= $form->field($model, 'warna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_totok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_rangka')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_mesin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'laku' => 'Laku', 'belum terjual' => 'Belum terjual', ], ['prompt' => 'PILIH STATUS']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
