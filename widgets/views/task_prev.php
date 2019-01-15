<?php
use yii\helpers\Url;

/**
 * @var $model \app\models\tables\Tasks
 */
?>
<div class="task-container">
	<a class="task-prev-link" href="<?= Url::to(['task/view', 'id' => $model->id]) ?>">
		<div>
			<h4><?= $model->title ?></h4>
			<p><?= $model->description ?></p>
			<p>Ответственный: <?= $model->responsible->login ?></p>
			<p>Дедлайн: <?= $model->deadline ?></p>
			<p>Создана: <?= $model->created ?></p>
			<p>Статус: <?= $model->taskStatus->title ?></p>
		</div>
	</a>
</div>