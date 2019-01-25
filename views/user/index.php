<?php
	use yii\widgets\ActiveForm;
	
	/**
	 * @var $model \app\controllers\UserController
	 * @var $month \app\controllers\UserController
	 * @var $dataProvider \app\controllers\UserController
	 */
	
	$form = ActiveForm::begin(['id' => 'monthFilter']);
	
	echo $form->field($model, 'month')->
							dropDownList(
								[1 => 'Январь', 2 => 'Февраль', 3 => 'Март'],
								['value' => $model->month, 'prompt' => 'Все месяцы']);
	echo \yii\helpers\Html::submitButton('Найти', ['class' => ['btn btn-success']]);
	
	ActiveForm::end();
?>
<?=
	\yii\widgets\ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => function ($model) {
			return \app\widgets\TaskPrev::widget(['model' => $model]);
		},
	]);
?>