<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Faktur */

$this->title = 'Create Faktur';
$this->params['breadcrumbs'][] = ['label' => 'Fakturs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faktur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
