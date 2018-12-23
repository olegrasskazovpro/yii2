<?php

use yii\db\Migration;

/**
 * Class m181223_210015_fill_tasks_status_with_data
 */
class m181223_210015_fill_tasks_status_with_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$this->batchInsert('tasks_status', ['title'], [
    		['New'], ['In progress'], ['Paused'], ['In fire'], ['Done'], ['Deleted']
			]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    	$arr = Yii::$app->db->createCommand('SELECT id FROM tasks_status')->queryColumn();
    	foreach ($arr as $id){
				$this->delete('tasks_status', "id = {$id}");
    	}
			Yii::$app->db->createCommand('ALTER TABLE tasks.tasks_status AUTO_INCREMENT=0')->query();
    }
}
