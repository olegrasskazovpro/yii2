<?php

namespace app\controllers;


use yii\web\Controller;

class TaskController extends Controller
{
	public function actionIndex ()
	{
		return $this->render('index', [
			'title' => 'Это Таск-Трекер',
			'content' => 'Привет, пользователь',
		]);
	}
}