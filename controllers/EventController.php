<?php
	
	namespace app\controllers;
	
	
	use app\models\tables\Tasks;
	use yii\web\Controller;
	
	class EventController extends Controller
	{
		public function actionIndex()
		{
			echo "Это EventController";
			
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