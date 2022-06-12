<?php

/** @var yii\web\View $this */

$this->title = 'Sport | профиль';

use yii\widgets\ActiveForm;
use app\models\Invent;
use app\models\Subscribes_invent;
use yii\helpers\Url;

$userData = Yii::$app->user->identity;

?>
<h1>Мой профиль</h1>
<div class="profile">
  <span>
    <div class="profile__avatar"> <?= mb_substr($userData['firstname'], 0, 1) ?></div>
    <a href=<?= Url::to(['users/edituser/', 'id' => $userData['id']]); ?>>Редактировать</a>
  </span>
  <div class="profile__data">
    <h2><?= $userData['firstname'] . ' ' . $userData['lastname'] ?></h2>
    <p><strong>Почта: </strong> <?= $userData['email'] ?></p>

  </div>

</div>
<div class="list-curse">
  <h2>Принимаю участие:</h2>

  <div class="curse-list">
    <?
    $subscribiesAll = Subscribes_invent::find()->all();
    foreach ($subscribiesAll as $item) {
      if ($item['id_user'] === $userData['id']) {
        $ivent = Invent::findOne($item['id_invent']);
        $id = $item['id_invent'];
        $id_user = $userData['id'];
    ?>
        <div class="curse-preview">
          <h2><?= $ivent['title'] ?></h2>
          <span> <a href=<?= Url::to(['invent/inventstr/', 'id' => $id]); ?>>Подробнее</a>
            <a href="<?= Url::toRoute(['invent/unsubscribies', 'idUser' => $id_user, 'idInvent' => $id]); ?>" class="cart">Отписаться</a>
          </span>
        </div>
    <? }
    } ?>

  </div>
</div>