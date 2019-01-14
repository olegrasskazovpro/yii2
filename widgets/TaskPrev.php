<?php
	
	namespace app\widgets;
	
	
	use app\models\tables\Tasks;
	use yii\base\Widget;
	
	class TaskPrev extends Widget
	{
		public $model;
		
		public function run()
		{
			if (is_a($this->model, Tasks::class)) {
				return $this->render('task_prev', ['model' => $this->model]);
			}
			
			throw new \Exception('Не получилось отобразить модель');
		}
	}