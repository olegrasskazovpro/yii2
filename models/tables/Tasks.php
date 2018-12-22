<?php

namespace app\models\tables;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $responsible_id
 * @property string $deadline
 * @property string $created
 * @property string $updated
 * @property int $status
 *
 * @property Users $responsible
 * @property TasksStatus $status0
 * @property User $user
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    public function getUser()
		{
			return $this->hasOne(Users::class, ['id' => 'responsible_id']);
		}

	/**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'responsible_id', 'created'], 'required'],
            [['description'], 'string'],
            [['responsible_id', 'status'], 'integer'],
            [['deadline', 'created', 'updated'], 'safe'],
            [['title'], 'string', 'max' => 80],
            [['responsible_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['responsible_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => TaskStatus::class, 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'responsible_id' => 'Responsible ID',
            'deadline' => 'Deadline',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsible()
    {
        return $this->hasOne(Users::class, ['id' => 'responsible_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(TaskStatus::class, ['id' => 'status']);
    }
}
