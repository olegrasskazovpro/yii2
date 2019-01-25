<?php
	namespace app\widgets;
	
	
	use app\models\tables\TaskAttachments;
	use yii\base\Widget;
	
	class Attachment extends Widget
	{
		public $model;
		
		public function run()
		{
			$class = TaskAttachments::class;
			if (is_a($this->model, $class)) {
				return $this->render('attachment', ['model' => $this->model]);
			}
			
			throw new \Exception("Не получилось отобразить модель {$class}");
		}
	}