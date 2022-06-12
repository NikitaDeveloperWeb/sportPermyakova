<?php

/** @var yii\web\View $this */

$this->title = 'Sport | аутентификация';

use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<body>
  <div class="wrapper">
    <div class="wrapper__subwrapper">
      <a href=<?= Url::to(['site/']); ?> class="logo">
        <h1>S</h1>
        port
      </a>
      <?php $form = ActiveForm::begin(['options' => ['class' => 'form', 'id' => "form_login"]]); ?>
      <?= $form->field($login_model, 'email')->input('email', ['class' => 'field-main', 'placeholder' => 'Почта'])->label('');  ?>
      <?= $form->field($login_model, 'password')->passwordInput(['class' => 'field-main', 'placeholder' => 'Пароль'])->label(''); ?>
      <button type="submit" class="button-main">Войти</button>
      <?php ActiveForm::end(); ?>
      <?php $form = ActiveForm::begin(['options' => ['class' => 'form', 'id' => 'form-registration'],]) ?>
      <?= $form->field($modelReg, 'lastname')->textInput(['class' => 'field-main', 'placeholder' => 'Фамилия'])->label('') ?>
      <?= $form->field($modelReg, 'firstname')->textInput(['autofocus' => true, 'class' => 'field-main', 'placeholder' => 'Имя'])->label('') ?>
      <?= $form->field($modelReg, 'email')->input('email', ['class' => 'field-main', 'placeholder' => 'Почта'])->label('') ?>
      <?= $form->field($modelReg, 'password')->passwordInput(['class' => 'field-main', 'placeholder' => 'Пароль'])->label('') ?>
      <?= $form->field($modelReg, 'password_repeat')->passwordInput(['class' => 'field-main', 'placeholder' => 'Повторите пароль'])->label('') ?>

      <button type="submit" class="button-main">Зарегистрироваться</button>


      <?php ActiveForm::end(); ?>
      <div class="switch" onclick="changeFormsState()">
        <h3></h3>
      </div>
    </div>
  </div>

</body>

</html>