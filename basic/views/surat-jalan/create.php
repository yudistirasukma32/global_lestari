<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SuratJalan */

$this->title = 'Create Surat Jalan';
$this->params['breadcrumbs'][] = ['label' => 'Surat Jalans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-jalan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
