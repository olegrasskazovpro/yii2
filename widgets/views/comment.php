<?php
	
	/**
	 * @var $model \app\models\tables\TaskComments
	 */
?>
<div class="comment-container">
	<p><span><?= $model->user->name ?>:</span></p>
	<p><?= $model->comment ?></p>
</div>