<?php
/**
 * @var $model \app\models\tables\Tasks
 */

?>
<a href="/?r=admin-tasks/view&id=<?= $model->id ?>" class="task-item">
	<div>
		<h4><?= $model->title ?></h4>
		<p>Ответственный: <?= $model->responsible_id ?></p>
		<p>Дедлайн: <?= $model->deadline ?></p>
		<p>Создана: <?= $model->created ?></p>
		<p>Статус: <?= $model->status ?></p>
	</div>
</a>