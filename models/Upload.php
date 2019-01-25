<?php
	
	namespace app\models;
	
	
	use yii\base\Model;
	use yii\imagine\Image;
	use yii\web\UploadedFile;
	
	class Upload extends Model
	{
		public $title;
		public $content;
		/**
		 * @var UploadedFile $file
		 */
		public $file;
		
		public function rules()
		{
			return [
				[['title', 'content'], 'safe'],
				[['file'], 'file', 'extensions' => 'png, jpg'],
			];
		}
		
		public function upload()
		{
			if($this->validate()){
				$filename = $this->file->getBaseName() . "." . $this->file->getExtension();
				$filepath = \Yii::getAlias("@img/{$filename}");
				$this->file->saveAs($filepath);
				
				Image::thumbnail($filepath, 100, 100)
				->save(\Yii::getAlias("@img/small/{$filename}"));
			}
		}
	}