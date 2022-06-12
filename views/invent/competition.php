<?php

/** @var yii\web\View $this */

$this->title = 'Sport | соревнование';

use yii\helpers\Url;
?>
<h1><?= $competition['title'] ?></h1>
<div class="news-full">

  <p><?= $competition['text'] ?>
  </p>
  <img src=<?= $competition['image'] ?> alt="" srcset="">
  <button onclick="window.history.back()" class="button-back">Назад</button>

</div>