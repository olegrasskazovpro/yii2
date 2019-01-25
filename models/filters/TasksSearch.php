<?php
	
	namespace app\models\filters;
	
	use yii\base\Model;
	use yii\data\ActiveDataProvider;
	use app\models\tables\Tasks;
	
	/**
	 * TasksSearch represents the model behind the search form of `app\models\tables\Tasks`.
	 */
	class TasksSearch extends Tasks
	{
		public $month;
		public $post;
		
		/**
		 * {@inheritdoc}
		 */
		public function rules()
		{
			return [
				[['id', 'responsible_id', 'status', 'month'], 'integer'],
				[['title', 'description', 'deadline', 'created', 'updated'], 'safe'],
			];
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function scenarios()
		{
			// bypass scenarios() implementation in the parent class
			return Model::scenarios();
		}
		
		/**
		 * Creates data provider instance with search query applied
		 *
		 * @param array $params
		 *
		 * @return ActiveDataProvider
		 */
		public function search($params)
		{
			$query = Tasks::find();
			
			// add conditions that should always apply here
			
			$dataProvider = new ActiveDataProvider([
				'query' => $query,
//					'pagination' => [
//						'pageSize' => 4,
//					]
			]);
			
			$this->load($params);
			
			if (!$this->validate()) {
				// uncomment the following line if you do not want to return any records when validation fails
				// $query->where('0=1');
				return $dataProvider;
			}
			
			// grid filtering conditions
			$query->andFilterWhere([
				'id' => $this->id,
				'responsible_id' => $this->responsible_id,
				'deadline' => $this->deadline,
				'created' => $this->created,
				'updated' => $this->updated,
				'status' => $this->status,
			]);
			
			$query->andFilterWhere(['like', 'title', $this->title])
				->andFilterWhere(['like', 'description', $this->description]);
			
			return $dataProvider;
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function attributeLabels()
		{
			return [
				'id' => 'ID',
				'title' => 'Заголовок задачи',
				'description' => 'Подробное описание задачи',
				'responsible_id' => 'Ответственный',
				'deadline' => 'Дедлайн',
				'created' => 'Создана',
				'updated' => 'Обновлена',
				'status' => 'Статус',
				'month' => 'Месяц дедлайна',
			];
		}
		
		/**
		 * If any month was sent with POST - method return ActiveQuery with authorized users tasks
		 * with selected month in deadline. Otherwise returns ActiveQuery for all users tasks.
		 * @param int $userId \app\controllers\UserController - id of authorized user
		 *
		 * @return \yii\db\ActiveQuery
		 */
		public function getQueryWithMonth($userId)
		{
			if(!empty($this->post) && $this->post['TasksSearch']['month']){
				$this->month = $this->post['TasksSearch']['month'];
				return Tasks::find()->
				where(['responsible_id' => $userId, 'MONTH(deadline)' => $this->month]);
			} else {
				return Tasks::find();
			}
		}
	}
