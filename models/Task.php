<?php
namespace app\models;


use app\validators\BadCodeValidator;
use yii\base\Model;

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
}