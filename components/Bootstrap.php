<?php
	namespace app\components;
	
	use app\models\tables\Tasks;
	use yii\base\BootstrapInterface;
	use yii\base\Component;
	use yii\base\Event;
	
	/**
	 * Class TaskNotifications
	 * @package app\components
	 * @var $model Tasks
	 */
	class Bootstrap extends Component implements BootstrapInterface
	{
		/**
		 * @var Application
		 */
		protected $app;
		
		public function bootstrap($app)
		{
			$this->app = $app;
			$this->setLang();
//			$this->eventHandlers();
		}
		
		protected function setLang()
		{
			$this->app->language = $this->app->session->get('lang');
		}
		
		protected function eventHandlers()
		{
			$email = function ($event){
				$task = $event->sender;
				$user = $task->responsible;
				\Yii::$app->mailer->compose()
					->setTo($user->email)
					->setFrom('admin@site.ru')
					->setSubject("You have a new task")
					->setTextBody("You was mentioned in task {$task->title}")
					->send();
				
				return true;
			};
			
			Event::on(Tasks::class, Tasks::EVENT_AFTER_INSERT, $email);
		}
	}