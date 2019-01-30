<?php
	
	namespace app\commands;
	use yii\console\Controller;
	
	class RbacController extends Controller
	{
		public function actionIndex()
		{
			$authManager = \Yii::$app->authManager;
			
			$admin = $authManager->createRole('admin');
			$moderator = $authManager->createRole('moderator');
			
			$authManager->add($admin);
			$authManager->add($moderator);
			
			$permissionTaskCreate = $authManager->createPermission('TaskCreate');
			$permissionTaskDelete = $authManager->createPermission('TaskDelete');
			$permissionTaskEdit = $authManager->createPermission('TaskEdit');
			
			$authManager->add($permissionTaskCreate);
			$authManager->add($permissionTaskDelete);
			$authManager->add($permissionTaskEdit);
			
			$authManager->addChild($admin, $permissionTaskCreate);
			$authManager->addChild($admin, $permissionTaskDelete);
			$authManager->addChild($admin, $permissionTaskEdit);
			
			$authManager->addChild($moderator, $permissionTaskCreate);
			$authManager->addChild($moderator, $permissionTaskEdit);
			
			$authManager->assign($admin, 1);
			$authManager->assign($admin, 2);
			$authManager->assign($admin, 3);
		}
		
		public function actionNew()
		{
			$authManager = \Yii::$app->authManager;
			$moder = $authManager->getRole('moderator');
			$authManager->assign($moder, 4);
		}
	}