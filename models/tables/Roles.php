<?php

namespace app\models\tables;

/**
 * This is the model class for table "roles".
 *
 * @property int $id
 * @property string $title
 *
 * @property Users[] $users
 * @property Roles[] $list
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Роль пользователя',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::class, ['role_id' => 'id']);
    }

    public static function getList()
		{
			return Roles::find()->select(['title', 'id'])->indexBy('id')->column();
		}
}
