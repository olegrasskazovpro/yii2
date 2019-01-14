<?php
namespace app\controllers;

use app\models\tables\Tasks;
use app\models\tables\Users;
use yii\web\Controller;

class DbController extends Controller
{
	public function actionIndex ()
	{
		/*\Yii::$app->db_users->createCommand("
		INSERT INTO users (id, name) VALUES
		(null,'Петр')
		")->execute();*/

//		$res = \Yii::$app->getDb()
	}

	public function actionAr()
	{
		$model = Users::findOne(6);
		var_dump($model);
		$model->name = 'Васька';
		$model->save();
		$model->errors;
//		$model->delete();
		var_dump($model);
	}

	public function actionFind()
	{
		$tasks = Users::find()->with('tasks.taskStatus')
			->all();
		var_dump($tasks);
	}
}