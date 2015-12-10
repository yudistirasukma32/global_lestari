<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'PT. Global Lestari Motorindo',
        'brandUrl' => ['/site/index'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            //['label' => 'Jenis Motor', 'url' => ['/jenis-motor/index']],
			//['label' => 'Jenis Motor', 'url' => ['/motor/index']],
            ['label' => 'Motor', 'visible' => !Yii::$app->user->isGuest,
			 'items' => [
                 ['label' => 'Jenis Motor', 'url' =>'../jenis-motor/index'],
                 '<li class="divider"></li>',
                 ['label' => 'Data Motor', 'url' => '../motor/index'],
                 ['label' => 'Posisi Motor', 'url' => '../posisi-motor/index'],
                 ['label' => 'Kondisi Motor', 'url' => '../kondisi-motor/index'],
				 ],
			],
			['label' => 'Penjualan', 'visible' => !Yii::$app->user->isGuest,
			 'items' => [
                 ['label' => 'Data Pembeli', 'url' =>'../pembeli/index'],
                 '<li class="divider"></li>',
                 ['label' => 'Data Penjualan', 'url' =>'../penjualan/index'],
                 '<li class="divider"></li>',
                 ['label' => 'Surat Jalan', 'url' => '../surat-jalan/index'],
                 '<li class="divider"></li>',
                 ['label' => 'Data Faktur', 'url' => '../faktur/index'],
                // ['label' => 'Data Fisik', 'url' => '../data-fisik/index'],

				 ],
			],
			/*['label' => 'Staf', 'visible' => !Yii::$app->user->isGuest,
			 'items' => [
                 ['label' => 'Data Staf', 'url' =>'#'],
                 '<li class="divider"></li>',
                 ['label' => 'Hak Akses Staf', 'url' => '#'],
				 ],
			],
			['label' => 'User', 'visible' => !Yii::$app->user->isGuest,
			 'items' => [
                 ['label' => 'User', 'url' =>'#'],
                 '<li class="divider"></li>',
                 ['label' => 'Profil', 'url' => '#'],
				 ['label' => 'Logs', 'url' => '#'],
				 ],
			],*/
			
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout <br/>(' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <br/><br/><br/><br/>
        <?php require('alert.php'); ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; PT. Global Lestari Motorindo <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
