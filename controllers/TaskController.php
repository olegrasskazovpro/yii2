<?php

namespace app\controllers;


use app\models\tables\Tasks;
use yii\web\Controller;

class TaskController extends Controller
{
	public function actionIndex ()
	{
		$model = new Tasks();
		return $this->render('index', ['model' => $model	]);
	}
}