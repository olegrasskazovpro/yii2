<?php

use yii\db\Migration;

/**
 * Class m181222_185330_alter_table_users
 */
class m181222_185330_alter_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$this->addColumn('users', 'login', 'VARCHAR(25) NOT NULL');
			$this->addColumn('users', 'password', 'VARCHAR(25) NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    	$this->dropColumn('users', 'login');
    	$this->dropColumn('users', 'password');
    }
}
