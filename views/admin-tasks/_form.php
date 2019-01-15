<?php
	
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	
	/**
	 * @var $this yii\web\View
	 * @var $model app\models\tables\Tasks
	 * @var $form yii\widgets\ActiveForm
	 * @var $responsibleList \app\controllers\AdminTasksController[]
	 * @var $taskStatusList \app\controllers\AdminTasksController[]
	 */
	
?>

<div class="tasks-form">
	
	<?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'responsible_id')->dropDownList($responsibleList, ['prompt' => 'Выберите']) ?>

	<?= $form->field($model, 'deadline')->textInput()->hint('В формате ГГГГ-ММ-ДД ЧЧ:ММ:СС') ?>
	
	<?= $form->field($model, 'status')->dropDownList($taskStatusList, ['prompt' => 'Выберите']) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>
	
	<?php ActiveForm::end(); ?>

</div>
