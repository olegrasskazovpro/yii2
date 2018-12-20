<?php
/**
 * Created by PhpStorm.
 * User: olegrasskazov
 * Date: 2018-12-20
 * Time: 14:30
 */

namespace app\controllers;


use app\models\ContactForm;
use yii\web\Controller;

class TaskController extends Controller
{
	public function actionIndex ()
	{
		$model = new ContactForm();
		$model->email = 'ff@d.ru';

		var_dump($model->validate());
		var_dump($model->getErrors());

		return $this->renderPartial('index', [
			'title' => 'Yii2 заголовок',
			'content' => 'Какой-то контент',
		]);
	}
}