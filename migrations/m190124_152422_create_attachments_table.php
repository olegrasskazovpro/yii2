<?php
	
	use yii\db\Migration;
	
	/**
	 * Handles the creation of table `attachments`.
	 */
	class m190124_152422_create_attachments_table extends Migration
	{
		protected $commentsTable = 'task_comments';
		protected $attachmentsTable = 'task_attachments';
		
		/**
		 * {@inheritdoc}
		 */
		public function safeUp()
		{
			$this->createTable($this->commentsTable, [
				'id' => $this->primaryKey(),
				'comment' => $this->string(),
				'task_id' => $this->integer(),
				'user_id' => $this->integer(),
			]);
			
			$taskTable = \app\models\tables\Tasks::tableName();
			$userTable = \app\models\tables\Users::tableName();
			
			$this->addForeignKey('fk_comments_task', $this->commentsTable, 'task_id', $taskTable, 'id');
			$this->addForeignKey('fk_comments_user', $this->commentsTable, 'user_id', $userTable, 'id');
			
			$this->createTable($this->attachmentsTable, [
				'id' => $this->primaryKey(),
				'task_id' => $this->integer(),
				'path' => $this->string(),
			]);
			
			$this->addForeignKey('fk_attachments_task', $this->attachmentsTable, 'task_id', $taskTable, 'id');
			
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function safeDown()
		{
			$this->dropTable($this->attachmentsTable);
			$this->dropTable($this->commentsTable);
		}
	}
