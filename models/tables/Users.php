<?php

namespace app\models\tables;

use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $login
 * @property string $password
 * @property string $role_id
 *
 * @property Tasks[] $tasks
 * @property Roles[] $roles
 * @property Users[] $list
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
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
            [['name', 'email', 'login', 'password'], 'string', 'max' => 25],
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
					'email' => 'E-mail',
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
				'email',
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

	public static function getList()
	{
		return Users::find()->select(['name', 'id'])->indexBy('id')->column();
	}
	
	public static function findIdentity($id)
	{
		return static::findOne($id);
	}
	
	public function validateAuthKey($authKey)
	{
		return $this->authKey === $authKey;
	}
	public function getAuthKey(){
		return $this->authKey;
	}
	public function getId()
	{
		return $this->id;
	}
	
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::findOne(['access_token' => $token]);
	}
}
