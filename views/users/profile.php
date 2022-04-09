<?php

/** @var yii\web\View $this */

$this->title = 'Financier | профиль';

use yii\helpers\Url;
?>
<h1>Мой профиль</h1>
<div class="profile">
  <span>
    <div class="profile__avatar">Н</div>
    <a href=<?= Url::to(['users/edituser/']); ?>>Редактировать</a>
  </span>
  <div class="profile__data">
    <h2>Никита Вячеславович Русаков (balens1aga)</h2>
    <p><strong>Почта: </strong> balens1aga@gmail.com</p>
    <p><strong>Номер: </strong> 8 908 827 42 63</p>
    <p><strong>Статус:</strong> Студент</p>
  </div>

</div>
<div class="list-curse">
  <h2>Мои курсы:</h2>
  <div class="curse-list">
    <div class="curse-preview">
      <h2>Название курса</h2>
      <p><strong>Автор: </strong> Никита Русаков</p>
      <p><strong>Уровень: </strong> Средний</p>
      <span> <a href="cursestr.html">Перейти к курсу</a>
        <form action="">
          <button class="button-main">Отписаться</button>
        </form>
      </span>
    </div>
    <div class="curse-preview">
      <h2>Название курса</h2>
      <p><strong>Автор: </strong> Никита Русаков</p>
      <p><strong>Уровень: </strong> Средний</p>
      <span> <a href="cursestr.html">Перейти к курсу</a>
        <form action="">
          <button class="button-main">Отписаться</button>
        </form>
      </span>
    </div>
    <div class="curse-preview">
      <h2>Название курса</h2>
      <p><strong>Автор: </strong> Никита Русаков</p>
      <p><strong>Уровень: </strong> Средний</p>
      <span> <a href="cursestr.html">Перейти к курсу</a>
        <form action="">
          <button class="button-main">Отписаться</button>
        </form>
      </span>
    </div>
  </div>
</div>