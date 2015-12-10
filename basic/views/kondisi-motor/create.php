<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KondisiMotor */

$this->title = 'Create Kondisi Motor';
$this->params['pbreadcrumbs'][] = ['label' => 'Kondisi Motor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kondisi-motor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
