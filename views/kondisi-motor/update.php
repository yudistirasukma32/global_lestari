<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KondisiMotor */

$this->title = 'Update Kondisi Motor: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kondisi Motor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kondisi-motor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
