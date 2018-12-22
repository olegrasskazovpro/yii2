<?php
namespace app\controllers;

use app\models\tables\Tasks;
use app\models\tables\TaskStatus;
use app\models\tables\Users;
use yii\db\Query;
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
		$model->delete();
	}

	public function actionFind()
	{
		$tasks = Tasks::find()
		->all();
		var_dump($tasks);
	}
}