<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m181226_083828_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
			$this->createTable('roles', [
				'id' => $this->primaryKey(),
				'title' => $this->string(),
			]);

			$this->createIndex('ix_roles_id', 'roles', 'id');
			$this->batchInsert('roles', ['title'], [
				['Админ'], ['Юзер'], ['Модератор']
			]);


			$this->addColumn('users', 'role_id', 'INT');

			$this->addForeignKey(
				'fk_users_role_id',
				'users',
				'role_id',
				'roles',
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
    	$this->dropForeignKey('fk_users_role_id', 'users');
    	$this->dropColumn('users', 'role_id');
			$this->dropTable('roles');
    }
}
