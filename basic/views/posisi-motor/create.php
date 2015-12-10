<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PosisiMotor */

$this->title = 'Create Posisi Motor';
$this->params['breadcrumbs'][] = ['label' => 'Posisi Motors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posisi-motor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
