<?php
	
	namespace app\widgets;
	
	
	use app\models\tables\TaskComments;
	use yii\base\Widget;
	
	class Comment extends Widget
	{
		public $model;
		
		public function run()
		{
			$class = TaskComments::class;
			if (is_a($this->model, $class)) {
				return $this->render('comment', ['model' => $this->model]);
			}
			
			throw new \Exception("Не получилось отобразить модель {$class}");
		}
	}