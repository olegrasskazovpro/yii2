<?php

namespace app\widgets;


use yii\base\Widget;

class TaskItem extends Widget
{
		public function run()
		{
			return $this->render('taskItem');
		}
}