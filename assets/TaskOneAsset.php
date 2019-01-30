<?php
	
	namespace app\assets;
	
	
	use yii\web\AssetBundle;
	use yii\web\JqueryAsset;
	
	class TaskOneAsset extends AssetBundle
	{
		public $basePath = '@webroot';
		public $baseUrl = '@web';
		public $css = [
		];
		public $js = [
			'js/my.js',
		];
		public $depends = [
			JqueryAsset::class,
		];
	}