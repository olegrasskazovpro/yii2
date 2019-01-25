<?php
	
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	
	/**
	 * @var $dataProvider \app\controllers\TaskController
	 */
?>
	<p>
		<?= Html::a(Yii::t('mainTask', 'create-task'), ['create'], ['class' => 'btn btn-success']) ?>
	</p>

<?=
	
	\yii\widgets\ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => function ($model) {
			return \app\widgets\TaskPrev::widget(['model' => $model]);
		},
	]);
?>