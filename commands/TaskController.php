<?php
	
	namespace app\commands;
	
	
	use app\models\tables\Tasks;
	use app\models\tables\Users;
	use app\models\Task;
	use yii\console\Controller;
	use yii\console\ExitCode;
	use yii\helpers\Console;
	
	class TaskController extends Controller
	{
		public $message;
		
		/**
		 * Test action
		 */
		public function actionTest($id)
		{
			if ($user = Users::findOne($id)) {
				$this->stdout("{$this->message}, {$user->name}", Console::FG_GREEN, Console::UNDERLINE);
				return ExitCode::OK;
			}
			return ExitCode::UNSPECIFIED_ERROR;
		}
		
		public function actionProcess()
		{
			Console::startProgress(0, 100);
			for ($i = 1; $i < 100; $i++) {
				sleep(1);
				Console::updateProgress($i, 100);
			}
			Console::endProgress();
		}
		
		public function actionNotify()
		{
			$tasks = Tasks::find()->with('responsible')->where("deadline < DATE_ADD(NOW(),INTERVAL 1 DAY)")->all();
			if (Task::notify($tasks)) {
				return ExitCode::OK;
			}
			return ExitCode::UNSPECIFIED_ERROR;
		}
		
		public function options($actionID)
		{
			return [
				'message',
			];
		}
		
		public function optionAliases()
		{
			return [
				'm' => 'message',
			];
		}
	}