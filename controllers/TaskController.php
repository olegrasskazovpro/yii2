<?php

namespace app\controllers;


use app\models\tables\TaskAttachments;
use app\models\tables\TaskComments;
use Yii;
use app\models\tables\Tasks;
use app\models\tables\TaskStatus;
use app\models\tables\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;

class TaskController extends Controller
{
	public function actionIndex ()
	{
		$model = new Tasks();
		$query = $model::find();
		
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);
		
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'model' => $model,
		]);
	}
	
	public function actionCreate()
	{
		$model = new Tasks();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['one', 'id' => $model->id]);
		}
		
		return $this->render('create', [
			'model' => $model	,
			'userList' => Users::getList(),
			'statusList' => TaskStatus::getList(),
		]);
	}
	
	public function actionOne($id)
	{
		$model = Tasks::findOne($id);
		$userId = Yii::$app->user->id ? Yii::$app->user->id : 1;
		
		$modelComment = new TaskComments();
		$queryComments = $modelComment::find()->where(['task_id' => $id]);
		$dataProvider = new ActiveDataProvider([
			'query' => $queryComments,
		]);
		
		$modelUpload = new TaskAttachments();
		$queryAttachments = $modelUpload::find()->where(['task_id' => $id]);
		$imgDataProvider = new ActiveDataProvider([
			'query' => $queryAttachments,
		]);
		
		return $this->render('one', [
			'model' => Tasks::findOne($id),
			'userList' => Users::getList(),
			'statusList' => TaskStatus::getList(),
			
			'dataProvider' => $dataProvider,
			'imgDataProvider' => $imgDataProvider,
			'status' => $model->taskStatus->title,
			'responsible' => $model->responsible->name,
			'userId' => $userId,
			'modelComment' => $modelComment,
			'modelUpload' => $modelUpload,
		]);
	}
	
	public function actionSave($id)
	{
		$model = Tasks::findOne($id);
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->session->setFlash('success', 'Задача сохранена');
		} else {
			Yii::$app->session->setFlash('error', 'Не удалось сохранить задачу');
		}
		
		$this->redirect(Yii::$app->request->referrer);
	}
	
	/**
	 * Save new comment to DB
	 */
	public function actionAddComment()
	{
		$model = new TaskComments();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->session->setFlash('success', 'Комментарий сохранен');
		} else {
			Yii::$app->session->setFlash('error', 'Не удалось сохранить комментарий');
		}
		
		$this->redirect(Yii::$app->request->referrer);
	}
	
	/**
	 * Save uploaded file to folder, creates miniature of img, save file info to DB
	 */
	public function actionAddFile()
	{
		$model = new TaskAttachments();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$model->file = UploadedFile::getInstance($model, 'file');
			$model->upload();
			Yii::$app->session->setFlash('success', 'Файл сохранен');
		} else {
			Yii::$app->session->setFlash('error', 'Не удалось сохранить файл');
		}
		
		$this->redirect(Yii::$app->request->referrer);
	}
}