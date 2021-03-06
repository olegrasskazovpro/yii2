<?php

use yii\db\Migration;

/**
 * Class m181223_212012_fill_tables_users_tasks_with_test_data
 */
class m181223_212012_fill_tables_users_tasks_with_test_data extends Migration
{
    /**
     * {@inheritdoc} fill with test data
     */
    public function safeUp()
    {
    	Yii::$app->db->createCommand('ALTER TABLE tasks.users AUTO_INCREMENT=0')->query();
			$this->batchInsert('users', ['name', 'email', 'login', 'password'], [
				['Oleg', 'user@test.ru', 'admin', 'admin'],
				['Petr', 'user@test.ru', 'petr', 'petr'],
				['Olga', 'user@test.ru', 'olga', 'olga'],
				['Igor', 'user@test.ru', 'igor', 'igor'],
				['Elena', 'user@test.ru', 'elena', 'elena'],
				['Vasily', 'user@test.ru', 'vasily', 'vasily'],
				['Kot', 'user@test.ru', 'kot', 'kot'],
				['Alex', 'user@test.ru', 'alex', 'alex'],
				['Evgenii', 'user@test.ru', 'evgenii', 'evgenii'],
				['Alexey', 'user@test.ru', 'alexey', 'alexey'],
				['Galina', 'user@test.ru', 'galina', 'galina'],
				['Artem', 'user@test.ru', 'artem', 'artem'],
			]);

			Yii::$app->db->createCommand('ALTER TABLE tasks.tasks AUTO_INCREMENT=0')->query();
			$this->batchInsert('tasks', ['title', 'description', 'responsible_id', 'created', 'status'], [
				['Task 1', 'Задача на миллион долларов', 1, date("Y-m-d H:i:s"), 1],
				['Task 2', 'Задача на миллион долларов', 1, date("Y-m-d H:i:s"), 2],
				['Task 3', 'Задача на миллион долларов', 2, date("Y-m-d H:i:s"), 2],
				['Task 4', 'Задача на миллион долларов', 2, date("Y-m-d H:i:s"), 2],
				['Task 5', 'Задача на миллион долларов', 2, date("Y-m-d H:i:s"), 2],
				['Task 6', 'Задача на миллион долларов', 3, date("Y-m-d H:i:s"), 1],
				['Task 7', 'Задача на миллион долларов', 4, date("Y-m-d H:i:s"), 3],
				['Task 8', 'Задача на миллион долларов', 4, date("Y-m-d H:i:s"), 4],
				['Task 9', 'Задача на миллион долларов', 4, date("Y-m-d H:i:s"), 5],
				['Task 10', 'Задача на миллион долларов', 5, date("Y-m-d H:i:s"), 6],
				['Task 11', 'Задача на миллион долларов', 5, date("Y-m-d H:i:s"), 1],
				['Task 12', 'Задача на миллион долларов', 6, date("Y-m-d H:i:s"), 1],
			]);
    }

    /**
     * {@inheritdoc} clear all table data
     */
    public function safeDown()
    {
			$arr = Yii::$app->db->createCommand('SELECT id FROM tasks')->queryColumn();
			foreach ($arr as $id){
				$this->delete('tasks', "id = {$id}");
			}
			Yii::$app->db->createCommand('ALTER TABLE tasks.tasks AUTO_INCREMENT=0')->query();

			$arr = Yii::$app->db->createCommand('SELECT id FROM users')->queryColumn();
			foreach ($arr as $id){
				$this->delete('users', "id = {$id}");
			}
			Yii::$app->db->createCommand('ALTER TABLE tasks.users AUTO_INCREMENT=0')->query();
    }

}
