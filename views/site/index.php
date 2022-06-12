<?php

/** @var yii\web\View $this */

$this->title = 'Sport | главная странница';

use app\models\News;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$userData = Yii::$app->user->identity;
?>

<body>
  <div class="wrapper">
    <header> <a href=<?= Url::to(['site/']); ?> class="logo">
        <h1>S</h1>
        port
      </a>
      <?php if ($userData) : ?>
        <a href=<?= Url::to(['site/profile/']); ?> class="header-link">
          В кабинет
        </a>
      <? endif; ?>
      <?php if (!$userData) : ?>
        <a href=<?= Url::to(['site/auth/']); ?> class="header-link">
          Авторизация
        </a>
      <? endif; ?>
    </header>
    <div class="intro">
      <h1>Портал для организации спортивных меропряитий и новостей из мира спорта.</h1>
      <h2>Последние новости</h2>
      <ul>

        <?php
        $newsAll = News::find()->all();
        $i = 0;
        foreach ($newsAll as $post) {
          $id = $post['id'];
          if ($i < 15) {
            $i++;
        ?>

            <li class="news-preview">
              <span>
                <h2><?= $post['title'] ?></h2>
                <p><?= $post['date'] ?></p>
              </span>
              <p><?= $post['subtitle'] ?></p>
              <img src=<?= $post['image'] ?> alt="" srcset="">
              <a href=<?= Url::to(['news/news/', 'id' => $id]); ?>>Читать далее...</a>
            </li>
        <? }
        } ?>
      </ul>
    </div>
    <div class="info-sport">

    </div>
    <footer>
      <a href=<?= Url::to(['site/']); ?> class="logo">
        <h1>S</h1>
        port
      </a>
      <p>- все права защищены 2022г.</p>
    </footer>
  </div>

</body>

</html>