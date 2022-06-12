<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;

use yii\bootstrap4\Html;

use yii\helpers\Url;

AppAsset::register($this);



$userData = Yii::$app->user->identity;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>

  <!-- <link rel="stylesheet" href="'@web/css/style.css" /> -->
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body>
  <?php $this->beginBody() ?>
  <div class="wrapper">
    <?php if ($userData) : ?>
      <header>
        <span class="header-span">

          <a href=<?= Url::to(['site/']); ?> class="logo">
            <h1>S</h1>
            port
          </a>
        </span>
        <span class="profile_preview" onclick="setStateEl()">
          <div class="profile-intro">
            <span class="profile-intro-span">
              <div class="avatar">
                <p><?= mb_substr($userData['firstname'], 0, 1) ?></p>
              </div>
              <div class="profile-intro__data">
                <p><?= $userData['firstname'] ?></p>
              </div>
              <?= Html::img('@web/image/arrow_down.png', ['alt' => 'Удалить', 'class' => 'icon', 'id' => 'arrow']); ?>
            </span>
          </div>
          <div class="profile-intro__menu">
            <?php if ($userData['typeUser'] === 'User') : ?>
              <a href=<?= Url::to(['users/profile']); ?>>Профиль</a>
            <?php endif; ?>
            <?php if ($userData && $userData['typeUser'] === 'Admin') : ?>
              <a href=<?= Url::to(['site/admin']); ?>>Панель</a>
            <?php endif; ?>
            <?= Html::beginForm(['/users/logout'], 'post')
              . Html::submitButton(
                'Выход',
                ['class' => '', 'style' => "color:red;border: none; display: flex; justify-content: center; padding: 0 !influence;"]
              )
              . Html::endForm() ?>
          </div>
        </span>
      </header>
    <? endif; ?>
    <?php if (!$userData) : ?>
      <header> <a href=<?= Url::to(['site/']); ?> class="logo">
          <h1>S</h1>
          port
        </a>
        <a href=<?= Url::to(['site/auth/']); ?> class="header-link">
          Авторизация
        </a>
      </header>
    <? endif; ?>
    <main>
      <div class="wrapper">
        <main>
          <?php if ($userData) : ?>
            <aside class="aside">

              <a href="<?= Url::to(['site/dashbord/']); ?>" id='news'>
                <!-- <?= Html::img('@web/image/news.png', ['alt' => 'Новости']); ?> -->
                <p>Новости</p>
              </a>
              <a href="<?= Url::to(['invent/invent/']); ?>" id='invent'>
                <!-- <?= Html::img('@web/image/curse.png', ['alt' => 'Курсы']); ?> -->
                <p>Мероприятия</p>
              </a>
              <a href="<?= Url::to(['site/feedback/']); ?>" id='feed'>
                <!-- <?= Html::img('@web/image/curse.png', ['alt' => 'Курсы']); ?> -->
                <p>Обратная связь</p>
              </a>

            </aside>
          <?php endif; ?>
          <div class="content">
            <?= $content  ?>
          </div>
        </main>
        <script>
          let BUTTON_ARROW = document.querySelector('#arrow');
          let BUTTON_GUMB = document.querySelector('#gumb');
          let MENU = document.querySelector('.profile-intro__menu');
          let ASIDE = document.querySelector('.aside');
          let MENU_STATE = false;
          let ASIDE_STATE = true;

          function setState(state) {
            MENU_STATE = state;
            BUTTON_ARROW.style.transition = '0.7s';
            if (state === false) {
              MENU.style.display = 'none';
              BUTTON_ARROW.style.transform = 'rotate(360deg)';
            } else {
              MENU.style.display = '';
              BUTTON_ARROW.style.transform = 'rotate(-180deg)';
            }
          }

          function setStateAside(state) {
            ASIDE_STATE = state;
            ASIDE.style.transition = '0.7s';
            if (state === false) {
              ASIDE.style.marginLeft = '-220px';

            } else {
              ASIDE.style.marginLeft = '0';

            }
          }
          setState(MENU_STATE);
          setStateAside(ASIDE_STATE);

          function setStateEl() {
            if (MENU_STATE) {
              MENU_STATE = false;
            } else {
              MENU_STATE = true;
            }
            setState(MENU_STATE);
            console.log(MENU_STATE);
          }

          function setStateElAside() {
            if (ASIDE_STATE) {
              ASIDE_STATE = false;
            } else {
              ASIDE_STATE = true;
            }
            setStateAside(ASIDE_STATE);
            console.log(ASIDE_STATE);
          }
          // aside active
          let ACTIVE_ELEM = 0;
          let ELEM_INVENT = document.querySelector('#invent');
          let ELEM_NEWS = document.querySelector('#news');
          let ELEM_feed = document.querySelector('#feed');


          let path = window.location.pathname;


          if (path === '/web/site/dashbord') {
            ACTIVE_ELEM = 0
          } else if (path === '/web/invent/invent') {
            ACTIVE_ELEM = 1
          } else if (path === '/web/site/feedback') {
            ACTIVE_ELEM = 2
          }


          function setActive(ACTIVE_ELEM_NUMBER) {

            if (ACTIVE_ELEM_NUMBER === 0) {
              ELEM_NEWS.classList.add('active');
              ELEM_INVENT.classList.remove('active');
              ELEM_feed.classList.remove('active');


            } else if (ACTIVE_ELEM_NUMBER === 1) {
              ELEM_NEWS.classList.remove('active');
              ELEM_INVENT.classList.add('active');
              ELEM_feed.classList.remove('active');

            } else if (ACTIVE_ELEM_NUMBER === 2) {
              ELEM_NEWS.classList.remove('active');
              ELEM_feed.classList.add('active');
              ELEM_INVENT.classList.remove('active');
            }
          }

          setActive(ACTIVE_ELEM);

          function setActiveClick(num) {
            setActive(num);
          }
        </script>
</body>


<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>