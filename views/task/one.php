<?php
	
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;
	
	/* @var $this yii\web\View */
	/* @var $model app\models\tables\Tasks */
	
	$this->title = $model->title;
	$this->params['breadcrumbs'][] = ['label' => Yii::t('mainNav', 'tasks'), 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
	\yii\web\YiiAsset::register($this);
	\app\assets\TaskOneAsset::register($this);
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="task-edit">
	<?php $form = ActiveForm::begin(['action' => Url::to(['task/save', 'id' => $model->id])]); ?>
	<?= $form->field($model, 'title')->textInput(); ?>
	<div class="row">
		<div class="col-lg-4">
			<?= $form->field($model, 'status')->dropDownList($statusList) ?>
		</div>
		<div class="col-lg-4">
			<?= $form->field($model, 'responsible_id')->dropDownList($userList) ?>
		</div>
		<div class="col-lg-4">
			<?= $form->field($model, 'deadline')
				->widget(\kartik\datetime\DateTimePicker::class, [
					'name' => 'datetime_10',
					'options' => ['placeholder' => 'Select deadline ...'],
					'convertFormat' => true,
					'pluginOptions' => [
						'language' => Yii::$app->session->get('lang'),
						'autoclose' => true,
						'todayHighlight' => true,
						'todayBtn' => true,
						'format' => 'yyyy-MM-dd H:i:00',
						'startDate' => date('yyyy-MM-dd H:i:00'),
						'todayHighlight' => true
					]
				]) ?>
		</div>
		<div class="col-lg-4"></div>
	</div>
	<?= $form->field($model, 'description')->textarea(); ?>
	<?= Html::submitButton(Yii::t('mainButtons', 'save'), ['class' => 'btn btn-primary']); ?>
	
	<?php ActiveForm::end() ?>

	<button id="my-btn" class="btn btn-danger">Нажми меня</button>

</div>
<hr>
<div>
	<h2><?= Yii::t('mainTask', 'attachments') ?></h2>
	<?=
		\yii\widgets\ListView::widget([
			'dataProvider' => $imgDataProvider,
			'summary' => '',
			'itemView' => function ($model) {
				return \app\widgets\Attachment::widget(['model' => $model]);
			},
			'options' => [
				'class' => 'attachment',
			]
		]);
	?>
	
	<?php
		/**
		 * @var $modelUpload \app\models\tables\TaskAttachments
		 * @var $userId int
		 * @var $userList []
		 * @var $statusList []
		 */
		
		if (Yii::$app->user->can('AddAttachment')) {
			$form = \yii\widgets\ActiveForm::begin(['action' => Url::to(['task/add-file']), 'id' => 'file']);
			echo Html::activeHiddenInput($modelUpload, 'task_id', ['value' => $model->id]);
			echo $form->field($modelUpload, 'file')
				->fileInput()
				->label(Yii::t('mainTask', 'add-attachment'));
			echo \yii\helpers\Html::submitButton(Yii::t('mainButtons', 'send'), ['class' => ['btn btn-success']]);
			
			\yii\widgets\ActiveForm::end();
		}
	?>
</div>
<hr>
<div>
	<h2><?= Yii::t('mainTask', 'comments') ?></h2>
	<?=
		\yii\widgets\ListView::widget([
			'dataProvider' => $dataProvider,
			'summary' => '',
			'itemView' => function ($model) {
				return \app\widgets\Comment::widget(['model' => $model]);
			},
			'options' => [
				'class' => 'comment',
			]
		]);
	?>
	
	<?php
		/**
		 * @var $modelComment \app\models\tables\TaskComments
		 * @var $userId int
		 * @var $userList []
		 * @var $statusList []
		 */
		
		if (Yii::$app->user->can('AddComment')) {
			$form = \yii\widgets\ActiveForm::begin(['action' => Url::to(['task/add-comment']), 'id' => 'comment']);
			
			echo Html::activeHiddenInput($modelComment, 'user_id', ['value' => $userId]);
			echo Html::activeHiddenInput($modelComment, 'task_id', ['value' => $model->id]);
			echo $form->field($modelComment, 'comment')->textarea()->label(Yii::t('mainTask', 'add-comment'));
			echo \yii\helpers\Html::submitButton(Yii::t('mainButtons', 'addComment'), ['class' => ['btn btn-success']]);
			
			\yii\widgets\ActiveForm::end();
		}
	?>
</div>