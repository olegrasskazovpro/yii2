<?php

namespace app\validators;


use yii\validators\Validator;

class EmailValidator extends Validator
{
	public function validateAttribute($model, $attribute)
	{
		$value = $model->$attribute;

		if (strlen($value) < 10){
			$this->addError($model, $attribute, "Емайл должен быть длиннее 10 символов");
		}
	}
}