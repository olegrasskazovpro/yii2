<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\tables\Users;
use app\models\tables\TaskStatus;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'responsible_id')->dropDownList(
		Users::find()->select(['name', 'id'])->indexBy('id')->column(),
		['prompt' => 'Выберите']) ?>

	<?= $form->field($model, 'deadline')->textInput()->hint('В формате ГГГГ-ММ-ДД ЧЧ:ММ:СС') ?>

	<?= Html::hiddenInput('updated', date('Y-m-d H:i:s')) ?>

	<?= $form->field($model, 'status')->dropDownList(
		TaskStatus::find()->select(['title', 'id'])->indexBy('id')->column(),
		['prompt' => 'Выберите']) ?>

	<div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
