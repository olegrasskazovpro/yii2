<?php
	
	/**
	 * @var $model \app\models\tables\TaskAttachments
	 */
?>
<div class="attachments-container">
	<a class="attachment-link" href="<?= "/img/{$model->path}"; ?>" target="_blank">
		<img src="<?= "/img/small/{$model->path}"; ?>" alt="">
	</a>
</div>