<?php

/** @var yii\web\View $this */

$this->title = 'Sport | рабочий стол';

use app\models\News;
use yii\helpers\Url;
?>
<h1>Новости</h1>
<ul>
  <?php
  $newsAll = News::find()->all();

  foreach ($newsAll as $post) {
    $id = $post['id'];
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
  <? } ?>
</ul>