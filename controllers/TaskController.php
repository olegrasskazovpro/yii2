<?php

namespace app\controllers;


use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TaskController extends Controller
{
	public function actionIndex ()
	{
		$dataProvider = new ActiveDataProvider([
			'query' => Tasks::find(),
			'pagination' => [
				'pageSize' => 8,
			],
		]);
		
		return $this->render('index', [
			'dataProvider' => $dataProvider,
		]);
	}
	
	public function actionCreate()
	{
		$model = new Tasks();
		return $this->render('create', ['model' => $model	, 'list' => Users::getList()]);
	}
	
	public function actionItem($id)
	{
		var_dump($id);
	}
}