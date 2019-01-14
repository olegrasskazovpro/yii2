<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\tables\Users;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TasksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?=

	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			'title',
			'description:ntext',
			/*'responsible_id' => [
				'value' => function ($data) {
					$user = Users::findOne($data->toArray()['responsible_id']);
					return $user->name;
				},
				'header' => 'Ответственный',
			],*/
			'responsible_id',
			'deadline',
			'created',
			//'updated',
			//'status',

			['class' => 'yii\grid\ActionColumn'],
		],
	]);

	/*\yii\widgets\ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => '/../widgets/views/taskItem.php',
	]);*/
	?>
</div>
