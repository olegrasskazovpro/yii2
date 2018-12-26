<?php
/**
 * @var \app\models\tables\Tasks $model
 */
$form = \yii\widgets\ActiveForm::begin(['id' => 'testForm']);

echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'description')->textarea();
echo $form->field($model, 'responsible_id')->dropDownList(
		\app\models\tables\Users::find()->select(['name', 'id'])->indexBy('id')->column(),
		['prompt' => 'Выберите']);
echo $form->field($model, 'deadline')->input('date');
echo \yii\helpers\Html::submitButton('Сохранить задачу', ['class' => ['btn btn-success']]);

\yii\widgets\ActiveForm::end();
?>