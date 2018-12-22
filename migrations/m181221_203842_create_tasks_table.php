<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks`.
 */
class m181221_203842_create_tasks_table extends Migration
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
					'created' => $this->dateTime()->notNull(),
					'updated' => $this->dateTime(),
					'status' => $this->integer()->notNull()->defaultValue(1),
        ]);

        $this->createIndex('ix_task_responsible','tasks','responsible_id');
        $this->createIndex('ix_task_status','tasks','status');
        $this->addForeignKey('fk_task_responsible_id', 'tasks','responsible_id', 'users',
					'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
