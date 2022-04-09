<?php

/** @var yii\web\View $this */

$this->title = 'Financier | аутентификация';

use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<body>
  <div class="wrapper">
    <div class="wrapper__subwrapper">
      <a href="index.html" class="logo">
        <h1>F</h1>
        inancier
      </a>
      <form action="" id="form_login">
        <h2>Вход</h2>
        <p>Введите данные</p>
        <input type="text" placeholder="Почта или логин" class="field-main" />
        <input type="text" placeholder="Пароль" class="field-main" />
        <button type="submit" class="button-main">Войти</button>
      </form>
      <form action="" id="form-registration">
        <h2>Регистрация</h2>
        <p>Введите данные</p>
        <input type="email" placeholder="Почта" class="field-main" />
        <input type="text" placeholder="Логин" class="field-main" />
        <input type="text" placeholder="Номер телефона" class="field-main" />
        <input type="text" placeholder="Имя" class="field-main" />
        <input type="text" placeholder="Фамилия" class="field-main" />
        <input type="text" placeholder="Отчество" class="field-main" />
        <input type="text" placeholder="Пароль" class="field-main" />
        <input type="text" placeholder="Повторите пароль" class="field-main" />
        <button type="submit" class="button-main">Зарегистрироваться</button>
      </form>
      <div class="switch" onclick="changeFormsState()">
        <h3></h3>
      </div>
    </div>
  </div>

</body>

</html>