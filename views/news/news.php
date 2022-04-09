<?php

/** @var yii\web\View $this */

$this->title = 'Financier | новость';

use yii\helpers\Url;
?>

<h1>Последняя новость</h1>

<div class="news-full">
  <img src="https://w-dog.ru/wallpapers/12/11/441564363585097/svet-cvet-uzor-linii-obem-treugolnik.jpg" alt="" srcset="">
  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora numquam dolorem odit quaerat, explicabo
    rem, ad, quos consectetur fuga magnam quam a veritatis assumenda maiores suscipit error nisi amet officia!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum illo dolorem officia soluta quam corporis, ad
    cumque sint, ullam, architecto iste cum excepturi! Deserunt consequatur quos hic cupiditate voluptates
    dolores!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel ab id vitae doloribus consequuntur, nam
    aperiam, expedita optio quaerat repellat, facilis tempore ex temporibus totam porro odio enim! Voluptatibus,
    suscipit!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam nulla reprehenderit recusandae voluptas
    nesciunt similique, obcaecati inventore in placeat necessitatibus quo facere architecto doloremque natus qui
    quibusdam consequuntur, quaerat aperiam!
  </p>
  <p>1.04.2022 г.</p>
  <button onclick="window.history.back()" class="button-back">Назад</button>
  <div class="coments">
    <h2>Коментарии</h2>
    <form action="">
      <input type="text" placeholder="Введите текст..." class="field-main" />
      <button type="submit" class="button-main">Отправить</button>
    </form>
    <div class="comments__item">
      <div class="comments__item__user">
        <span>
          <span>
            <div class="avatar">
              <p>H</p>
            </div>
            <p>Никита Русаков</p>
          </span>
          <p>22.03.2022</p>
        </span>
        <p>Не особо интересуюсь этой темой.</p>
      </div>

    </div>
    <div class="comments__item">
      <div class="comments__item__user">
        <span>
          <span>
            <div class="avatar">
              <p>H</p>
            </div>
            <p>Никита Русаков</p>
          </span>
          <p>22.03.2022</p>
        </span>
        <p>Не особо интересуюсь этой темой.</p>
      </div>

    </div>
    <div class="comments__item">
      <div class="comments__item__user">
        <span>
          <span>
            <div class="avatar">
              <p>H</p>
            </div>
            <p>Никита Русаков</p>
          </span>
          <p>22.03.2022</p>
        </span>
        <p>Не особо интересуюсь этой темой.</p>
      </div>

    </div>
  </div>
</div>