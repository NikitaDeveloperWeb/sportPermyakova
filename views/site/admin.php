<?php

/** @var yii\web\View $this */

$this->title = 'Sport |  административная панель';

use app\models\Competition;
use app\models\Invent;
use app\models\Feedback;
use app\models\News;
use app\models\User;
use yii\helpers\Url;

$newsAll = News::find()->all();
$inventAll = Invent::find()->all();
$competitionAll = Competition::find()->all();
$feedbackAll = Feedback::find()->all();
?>
<h1>Административная панель</h1>
<div class="panel">
  <div class="panel__nav">
    <button class="button-main" onclick="changeTNews()">Новости</button>
    <button class="button-main" onclick="changeTInvent()">Мероприятия</button>
    <button class="button-main" onclick="changeTCompetition()">Соревнования</button>
    <button class="button-main" onclick="changeTFeed()">Обратная связь</button>
  </div>
  <div class="panel__data">

    <table class="panel__data__table" id="Tnews">
      <h2>Новости</h2>
      <a href="<?= Url::to(['news/addnews/']); ?>">Добавить</a>
      <?
      foreach ($newsAll as $post) {
        $autor = User::findOne($post['autor']);
        $id = $post['id'];
      ?>

        <tr>
          <td><strong>ID:</strong><?= $post['id'] ?></td>
          <td><strong>Заголовок:</strong><?= $post['title'] ?></td>
          <td><strong>Подзаголовок:</strong><?= $post['subtitle'] ?></td>
          <td><strong>Дата:</strong><?= $post['date'] ?></td>
          <td><strong>Изображение:</strong><img src="<?= $post['image'] ?>" alt=""></td>
          <td><strong>Текст:</strong><?= $post['text'] ?></td>
          <td><strong>Автор:</strong><?= $autor['firstname'] . " " . $autor['lastname'] ?></td>
          <td><strong>Управление:</strong>
            <a href="<?= Url::to(['news/deletenews/', 'id' => $id]); ?>">Удалить</a>
          </td>
        </tr>
      <? } ?>
    </table>


    <table class="panel__data__table" id="Tinvent">
      <h2>Мероприятия</h2>
      <a href="<?= Url::to(['invent/addinvent/']); ?>">Добавить</a>
      <?
      foreach ($inventAll as $item) {
        $autor = User::findOne($item['author']);
        $id = $item['id'];
      ?>

        <tr>
          <td><strong>ID:</strong><?= $id ?></td>
          <td><strong>Заголовок:</strong><?= $item['title'] ?></td>
          <td><strong>Подзаголовок:</strong><?= $item['description'] ?></td>
          <td><strong>Автор:</strong><?= $autor['firstname'] . " " . $autor['lastname'] ?></td>
          <td><strong>Управление:</strong>
            <a href="<?= Url::to(['invent/deleteinvent/', 'id' => $id]); ?>">Удалить</a>
            <a href="<?= Url::to(['invent/addcompetition/', 'id' => $id]); ?>">Добавить соревнование</a>
          </td>
        </tr>
      <?

      } ?>
    </table>


    <table class="panel__data__table" id="Tcompetition">
      <h2>Соревнования</h2>

      <?
      foreach ($competitionAll as $item) {
        $invent = Invent::findOne($item['invent']);
        $id = $item['id'];
      ?>

        <tr>
          <td><strong>ID:</strong><?= $item['id'] ?></td>
          <td><strong>Заголовок:</strong><?= $item['title'] ?></td>
          <td><strong>Подзаголовок:</strong><?= $item['description'] ?></td>
          <td><strong>Изображение:</strong><img src=<?= $item['image'] ?> /></td>
          <td><strong>Соревнование:</strong><?= $invent['title'] ?></td>
          <td><strong>Управление:</strong>
            <a href="<?= Url::to(['invent/deletecompetition/', 'id' => $id]); ?>">Удалить</a>
          </td>
        </tr>
      <?

      } ?>
    </table>

    <table class="panel__data__table" id="Tfeed">
      <h2>Обратная связь</h2>
      <?
      foreach ($feedbackAll as $feed) {
        $autor = User::findOne($feed['user']);
        $id = $feed['id'];
      ?>

        <tr>
          <td><strong>ID:</strong><?= $feed['id'] ?></td>
          <td><strong>Дата:</strong><?= $feed['date'] ?></td>
          <td><strong>Текст:</strong><?= $feed['text'] ?></td>
          <td><strong>Автор:</strong><?= $autor['firstname'] . " " . $autor['lastname'] ?></td>
          <td><strong>Управление:</strong>
            <a href="<?= Url::to(['site/deletefeed/', 'id' => $id]); ?>">Просмотренно</a>
          </td>
        </tr>
      <? } ?>
    </table>
  </div>
  <script>
    let PANELS_NEWS = document.getElementById('Tnews');
    let PANELS_INVENT = document.getElementById('Tinvent');
    let PANELS_COMPETITION = document.getElementById('Tcompetition');
    let PANELS_FEEDBACK = document.getElementById('Tfeed');
    let PANELS_T_STATE = 0;

    function setTElement(state) {
      if (state === 0) {
        PANELS_NEWS.style.display = '';
        PANELS_INVENT.style.display = 'none';
        PANELS_COMPETITION.style.display = 'none';
        PANELS_FEEDBACK.style.display = 'none';
      } else if (state === 1) {
        PANELS_NEWS.style.display = 'none';
        PANELS_INVENT.style.display = '';
        PANELS_COMPETITION.style.display = 'none';
        PANELS_FEEDBACK.style.display = 'none';
      }else if (state === 2) {
        PANELS_NEWS.style.display = 'none';
        PANELS_INVENT.style.display = 'none';
        PANELS_COMPETITION.style.display = '';
        PANELS_FEEDBACK.style.display = 'none';
      } else {
        PANELS_COMPETITION.style.display = 'none';
        PANELS_NEWS.style.display = 'none';
        PANELS_INVENT.style.display = 'none';
        PANELS_FEEDBACK.style.display = '';
      }
    }
    setTElement(PANELS_T_STATE);

    function setTState(state) {
      PANELS_T_STATE = state;
      setTElement(PANELS_T_STATE);
    }

    const changeTNews = () => {
      setTState(0);
    };
    const changeTInvent = () => {
      setTState(1);
    };
    const changeTCompetition = () => {
      setTState(2);
    };
    const changeTFeed = () => {
      setTState(3);
    };
  </script>
</div>