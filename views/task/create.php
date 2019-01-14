<?php
/**
 * @var \app\models\tables\Tasks $model
 * @var \app\controllers\TaskController[] $list
 */
$form = \yii\widgets\ActiveForm::begin(['id' => 'testForm']);

echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'description')->textarea();
echo $form->field($model, 'responsible_id')->dropDownList($list, ['prompt' => 'Выберите']);
echo $form->field($model, 'deadline')->input('date');
echo \yii\helpers\Html::submitButton('Сохранить задачу', ['class' => ['btn btn-success']]);

\yii\widgets\ActiveForm::end();
?>