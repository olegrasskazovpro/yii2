<?php

namespace app\models\tables;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $password
 * @property string $role_id
 *
 * @property Tasks[] $tasks
 * @property Roles[] $roles
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

	/**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'login', 'password', 'role_id'], 'required'],
            [['name', 'login', 'password'], 'string', 'max' => 25],
            [['role_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
					'id' => 'ID',
					'name' => 'Name',
					'login' => 'Login',
					'password' => 'Password',
					'role_id' => 'Role ID',
        ];
    }

    public function fields()
		{
			return [
				'id',
				'username' => 'login',
				'password',
				'role_id',
			];
		}

	/**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::class, ['responsible_id' => 'id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRoles()
	{
		return $this->hasMany(Roles::class, ['role_id' => 'id']);
	}
}
