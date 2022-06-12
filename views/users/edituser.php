<?php

/** @var yii\web\View $this */

$this->title = 'Sport | редактирвоание пользователя';

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<h1>Редактировать профиль</h1>
<?php $form = ActiveForm::begin([]); ?>
<p>Исправте данные</p>

<?= $form->field($model, 'email')->input('email', ['autofocus' => true, 'maxlength' => true, 'class' => 'field-main'])->label('') ?>
<?= $form->field($model, 'firstname')->textInput(['class' => 'field-main', 'placeholder' => 'Имя'])->label('') ?>
<?= $form->field($model, 'lastname')->textInput(['class' => 'field-main', 'placeholder' => 'Фамилия'])->label('') ?>

<button type="submit" class="button-main">Редактировать</button>
<?php ActiveForm::end(); ?>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>