<?php

/** @var yii\web\View $this */

$this->title = 'Financier | редактирвоание пользователя';

use yii\helpers\Url;
?>
<h1>Редактировать профиль</h1>
<form action="" id="form-registration">
  <p>Исправте данные</p>
  <input type="email" placeholder="Почта" class="field-main" />
  <input type="text" placeholder="Логин" class="field-main" />
  <input type="text" placeholder="Номер телефона" class="field-main" />
  <input type="text" placeholder="Имя" class="field-main" />
  <input type="text" placeholder="Фамилия" class="field-main" />
  <input type="text" placeholder="Отчество" class="field-main" />
  <button type="submit" class="button-main">Редактировать</button>
</form>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>