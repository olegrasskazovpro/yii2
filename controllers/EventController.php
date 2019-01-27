<?php
	
	namespace app\controllers;
	
	
	use app\models\tables\Tasks;
	use app\models\Task;
	use yii\web\Controller;
	use Yii;
	
	class EventController extends Controller
	{
		public function actionIndex()
		{
//			$tasks = Tasks::find()->where("deadline < DATE_ADD(NOW(),INTERVAL 1 DAY)")->all();
//			Task::notify($tasks);
		}
		
		public function actionBeh()
		{
			$model = new Tasks();
			/*$model->attachBehavior('my', [
				'class' => TestBehavior::class,
				'mes' => 'Eeeeeeee',
			]);*/
			
			$model->foo();
		}
	}