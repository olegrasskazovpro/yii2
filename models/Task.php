<?php
namespace app\models;


use app\models\tables\Tasks;
use app\validators\BadCodeValidator;
use yii\base\Model;
use yii\console\ExitCode;

class Task extends Model
{
	public $id;
	public $title;
	public $description;
	public $responsibleId;
	public $deadline;
	public $created;
	public $updated;
	public $status;
	public $month;

	/**
	 * @return array the validation rules.
	 *
	 */
	public function rules()
	{
		return [
			[['title', 'responsibleId'], 'required', 'message' => 'Заполните обязательное поле'],
			['title', 'string', 'length' => [2, 80], 'message' => 'Заголовок от 2 до 80 символов'],
			['description', 'string', 'length' => [0, 99999], 'message' => 'Описание в текстовом виде'],
			['description', BadCodeValidator::class, 'message' => 'Описание содержит запрещенный код'],
			['responsibleId', 'integer', 'message' => 'Тут должен быть ID пользователя'],
		];
	}
	
	public static function notify(array $tasks)
	{
		if (!empty($tasks)){
			/**
			 * @var Tasks[] $tasks
			 */
			foreach ($tasks as $task){
				\Yii::$app->mailer->compose()
					->setTo($task->responsible->email)
					->setFrom('admin@site.ru')
					->setSubject("Task id={$task->id} in fire!")
					->setTextBody("Hello, {$task->responsible->name}. Your task '{$task->title}', id={$task->id} have less than 24 hours to deadline")
					->send();
			}
			return true;
		}
		return false;
	}
}