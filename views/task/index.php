<?php
	/**
	 * @var $dataProvider \app\controllers\TaskController
	 */
	?>
<?=
	
	\yii\widgets\ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => function ($model) {
			return \app\widgets\TaskPrev::widget(['model' => $model]);
		},
	]);
?>