<?php

/** @var yii\web\View $this */

$this->title = 'Sport | мероприятие';

use app\models\Invent;
use app\models\Subscribes_invent;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
<h1>Мероприятия</h1>
<div class="curse-list">
  <?
  $inventAll = Invent::find()->all();
  $subscribiesAll = Subscribes_invent::find()->all();
  $userData = Yii::$app->user->identity;
  $inventSub = [];
  $inventArray = [];

  if (count($subscribiesAll) > 0) {
    foreach ($subscribiesAll as $sub) {
      foreach ($inventAll as $invent) {
        if ($sub['id_user'] === $userData['id'] && $sub['id_invent'] === $invent['id']) {

          array_push($inventSub, $invent);
        }
      }
    }
  } else {
    $inventSub = $inventAll;
  }

  if (count($subscribiesAll) > 0) {
    foreach ($inventSub as $invSub) {
      array_push($inventArray, $invSub['id']);
    }
    foreach ($inventAll as $key => $item) {
      if (in_array($item['id'], $inventArray)) unset($inventAll[$key]);
    }
  }
  foreach ($inventAll as $item) {
    $id = $item['id'];
    $id_user = $userData['id'];
    $id_invent = $item['id'];
  ?>
    <div class="curse-preview">
      <h2><?= $item['title'] ?></h2>
      <span> <a href=<?= Url::to(['invent/inventstr/', 'id' => $id]); ?>>Подробнее</a>
        <a href="<?= Url::toRoute(['invent/subscribies', 'idUser' => $id_user, 'idInvent' => $id_invent]); ?>">Участвовать</a>
      </span>
    </div>
  <?
  }
  ?>
</div>