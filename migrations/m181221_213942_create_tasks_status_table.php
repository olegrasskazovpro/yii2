<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks_status`.
 */
class m181221_213942_create_tasks_status_table extends Migration
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

			$this->addForeignKey('fk_tasks_status',
				'tasks',
				'status',
				'tasks_status',
				'id',
				'RESTRICT',
				'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
			$this->dropForeignKey('fk_tasks_status', 'tasks');
      $this->dropTable('tasks_status');
    }
}
