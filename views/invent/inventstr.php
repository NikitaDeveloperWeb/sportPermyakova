<?php

/** @var yii\web\View $this */

$this->title = 'Sport | мероприятие';

use app\models\Competition;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


?>
<span class="curse-top">
  <h1><?= $invent['title'] ?></h1>

</span>
<p class="autor-gloss">
  <strong>Пояснения организатора:</strong> <?= $invent['description'] ?>
</p>
<?
$competitionAll = Competition::find()->all();

foreach ($competitionAll as $item) {
  if ($item['invent'] === $invent['id']) {
    $id = $item['id'];
?>
    <div class="curse-lection">
      <div class="curse-lection__item">
        <h2><?= $item['title'] ?></h2>
        <p><?= $item['description'] ?></p>
        <a href=<?= Url::to(['invent/competition/', 'id' => $id]); ?>>Читать</a>
      </div>

  <? }
} ?>

    </div>