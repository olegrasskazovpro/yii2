<?php
/**
 * @var $model \app\models\tables\Tasks
 * @var $userList \app\controllers\SiteController[]
 * @var $statusList \app\controllers\SiteController[]
 */
$form = \yii\widgets\ActiveForm::begin(['id' => 'task-create-form']);

echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'description')->textarea();
echo $form->field($model, 'responsible_id')->dropDownList($userList, ['prompt' => Yii::t('mainForms', 'choose')]);
echo $form->field($model, 'deadline')->textInput();
echo $form->field($model, 'status')->dropDownList($statusList, ['prompt' => Yii::t('mainForms', 'choose')]);
echo \yii\helpers\Html::submitButton(Yii::t('mainButtons', 'save'), ['class' => ['btn btn-success']]);

\yii\widgets\ActiveForm::end();
?>