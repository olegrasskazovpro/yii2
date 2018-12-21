<?php
/**
 * Created by PhpStorm.
 * User: olegrasskazov
 * Date: 2018-12-20
 * Time: 14:30
 */

namespace app\controllers;


use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
	public function actionIndex ()
	{
		$task = new Task();
		$task->title = 'New task oooo';
		$task->id = 2;
		$task->description = 'Here is desc';
		$task->responsibleId = 1;
		$task->createDate = date('Y-m-d');

		$task->validate();

		var_dump($task);exit;

		return $this->render('index', [
			'title' => 'Это Таск-Трекер',
			'content' => 'Привет, пользователь',
		]);
	}
}