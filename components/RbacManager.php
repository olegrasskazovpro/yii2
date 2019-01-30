<?php
	
	namespace app\components;
	
	
	use app\models\tables\Users;
	use dektrium\rbac\components\ManagerInterface;
	use yii\rbac\PhpManager;
	use dektrium\rbac\components\DbManager;
	
	class RbacManager extends DbManager implements ManagerInterface
	{
		public function getItems($type = null, $excludeItems = [])
		{
			// you should implement this method or extend your class from \dektrium\rbac\components\DbManager
		}
		
		public function getItem($name)
		{
			// you should implement this method or extend your class from \dektrium\rbac\components\DbManager
		}
	}