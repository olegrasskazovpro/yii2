<?php
	
	namespace app\controllers;
	
	use app\models\filters\TasksSearch;
	use Yii;
	use yii\data\ActiveDataProvider;
	use yii\web\Controller;
	
	class UserController extends Controller
	{
		public function actionIndex()
		{
			$userId = Yii::$app->user->id;
			$model = new TasksSearch();
			$model->post = Yii::$app->request->post();
			$query = $model->getQueryWithMonth($userId);
			
			$dataProvider = new ActiveDataProvider([
				'query' => $query,
			]);
			
			Yii::$app->db->cache(function () use ($dataProvider){
				return $dataProvider->prepare();
			});
			
			return $this->render('index', ['model' => $model,'dataProvider' => $dataProvider]);
		}
	}