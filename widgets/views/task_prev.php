<?php
use yii\helpers\Url;

/**
 * @var $model \app\models\tables\Tasks
 */
?>
<div class="task-container">
	<a class="task-prev-link" href="<?= Url::to(['task/one', 'id' => $model->id]) ?>">
		<div>
			<h4><?= $model->title ?></h4>
			<p><?= $model->description ?></p>
			<p><?= Yii::t('mainTask', 'responsible') . ': ' . $model->responsible->login ?></p>
			<p><?= Yii::t('mainTask', 'deadline') . ': ' . $model->deadline ?></p>
			<p><?= Yii::t('mainTask', 'created') . ': ' . $model->created ?></p>
			<p><?= Yii::t('mainTask', 'status') . ': ' . $model->taskStatus->title ?></p>
		</div>
	</a>
</div>