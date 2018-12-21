<?php

namespace app\validators;


use yii\validators\Validator;

class BadCodeValidator extends Validator
{
	public $badCodeArr = ['script', 'php'];

	public function validateAttribute($model, $attribute)
	{
		$value = $model->$attribute;

		if ($this->ifHasBadCode($value, $this->badCodeArr)){
			$this->addError($model, $attribute, "Текст не должен содержать кода, отличного от HTML");
		}
	}

	private function ifHasBadCode($value, $badCodeArr)
	{
		foreach ($badCodeArr as $item)
		{
			$reg = "/\W{$item}\W/i";
			if(preg_match($reg, $value)) {
				return true;
			}
		}
		return false;
	}
}