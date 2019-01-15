<?php
	
	namespace app\models\tables;
	
	use yii\behaviors\TimestampBehavior;
	use yii\db\Expression;
	
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
	 * @property TaskStatus $taskStatus
	 */
	class Tasks extends \yii\db\ActiveRecord
	{
		public function behaviors()
		{
			return [
				'timestamp' => [
					'class' => TimestampBehavior::class,
					'createdAtAttribute' => 'created',
					'updatedAtAttribute' => 'updated',
					'value' => new Expression('NOW()'),
				]
			];
		}
		
		
		/**
		 * {@inheritdoc}
		 */
		public static function tableName()
		{
			return 'tasks';
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function rules()
		{
			return [
				[['title', 'responsible_id', 'status'], 'required'],
				[['title'], 'string', 'max' => 80],
				[['description'], 'string'],
				[['responsible_id', 'status'], 'integer'],
				[['deadline', 'created', 'updated'], 'datetime'],
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
				'title' => 'Заголовок задачи',
				'description' => 'Подробное описание задачи',
				'responsible_id' => 'Ответственный',
				'deadline' => 'Крайний срок',
				'created' => 'Создана',
				'updated' => 'Обновлена',
				'status' => 'Статус',
			];
		}
		
		/**
		 * @return \yii\db\ActiveQuery
		 */
		public function getTaskStatus()
		{
			return $this->hasOne(TaskStatus::class, ['id' => 'status']);
		}
		
		public function getResponsible()
		{
			return $this->hasOne(Users::class, ['id' => 'responsible_id']);
		}
	}
