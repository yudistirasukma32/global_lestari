<html>

<?$model = \app\models\Notice;?>
<?= \yii\widgets\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'info:ntext',
    ],
]) ?>

</html>
