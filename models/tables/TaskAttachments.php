<?php
	
	namespace app\models\tables;
	
	use yii\imagine\Image;
	
	/**
	 * This is the model class for table "task_attachments".
	 *
	 * @property int $id
	 * @property int $task_id
	 * @property string $path
	 *
	 * @property Tasks $task
	 */
	class TaskAttachments extends \yii\db\ActiveRecord
	{
		public $file;
		
		/**
		 * {@inheritdoc}
		 */
		public static function tableName()
		{
			return 'task_attachments';
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function rules()
		{
			return [
				[['task_id'], 'integer'],
				[['path'], 'string', 'max' => 255],
				[['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::class, 'targetAttribute' => ['task_id' => 'id']],
			];
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function attributeLabels()
		{
			return [
				'id' => 'ID',
				'task_id' => 'Task ID',
				'path' => 'Path',
			];
		}
		
		/**
		 * @return \yii\db\ActiveQuery
		 */
		public function getTask()
		{
			return $this->hasOne(Tasks::class, ['id' => 'task_id']);
		}
		
		public function upload()
		{
			if ($this->validate()) {
				$filename = $this->file->getBaseName() . "." . $this->file->getExtension();
				$filepath = \Yii::getAlias("@img/{$filename}");
				$this->file->saveAs($filepath);
				
				Image::thumbnail($filepath, 100, 100)
					->save(\Yii::getAlias("@img/small/{$filename}"));
				
				$this->path = $filename;
				$this->save();
			}
		}
	}
