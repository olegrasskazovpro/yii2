<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks_status`.
 */
class m181223_205506_create_tasks_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
		{
			$this->createTable('tasks_status', [
				'id' => $this->primaryKey(),
				'title' => $this->string(25)->notNull(),
			]);

			$this->createIndex('idx_tasks_status_id', 'tasks_status', 'id');
		}

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks_status');
    }
}
