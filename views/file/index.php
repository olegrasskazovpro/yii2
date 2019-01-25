<?php
	
	use yii\widgets\ActiveForm;
	
	/**
	 * @var \app\models\Upload $model
	 */
	$form = ActiveForm::begin();
	echo $form->field($model, 'title')->textInput();
	echo $form->field($model, 'content')->textInput();
	echo $form->field($model, 'file')->fileInput();
	echo \yii\helpers\Html::submitButton('Send');
	
	ActiveForm::end();
	?>