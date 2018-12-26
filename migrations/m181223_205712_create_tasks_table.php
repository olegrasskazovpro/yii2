<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181223_205712_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
			$this->createTable('tasks', [
				'id' => $this->primaryKey(),
				'title' => $this->string(80)->notNull(),
				'description' => $this->text(),
				'responsible_id' => $this->integer()->notNull(),
				'deadline' => $this->dateTime(),
				'created' => $this->dateTime(),
				'updated' => $this->dateTime(),
				'status' => $this->integer()->notNull()->defaultValue(1),
			]);

			$this->createIndex('ix_tasks_responsible_id','tasks','responsible_id');
			$this->createIndex('ix_tasks_status','tasks','status');
			$this->addForeignKey(
				'fk_task_responsible_id',
				'tasks',
				'responsible_id',
				'users',
				'id',
				'RESTRICT',
				'CASCADE'
			);
			$this->addForeignKey(
				'fk_tasks_status',
				'tasks',
				'status',
				'tasks_status',
				'id',
				'RESTRICT',
				'CASCADE'
			);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
