<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m181223_205400_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
			$this->createTable('users', [
				'id' => $this->primaryKey(),
				'name' => $this->string(25),
				'login' => $this->string(25)->notNull(),
				'password' => $this->string(25)->notNull(),
			]);

			$this->createIndex('idx_users_id', 'users', ['id', 'login']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
