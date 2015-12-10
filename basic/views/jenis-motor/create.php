<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisMotor */

$this->title = 'Create Jenis Motor';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Motors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-motor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
