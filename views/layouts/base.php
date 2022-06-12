<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>

  <link rel="stylesheet" href="./css/style.css" />
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body>
  <?php $this->beginBody() ?>
  <div class="wrapper">

    <main>
      <?= $content  ?>
    </main>
    <script>
      // Auth

      let FORMS_STATE = false;
      let AUTH_FORM = document.querySelector('#form_login');
      let REG_FORM = document.querySelector('#form-registration');
      let Switch = document.querySelector('.switch');

      function setElement(state) {
        if (state === false) {
          Switch.querySelector('h3').innerText = 'Нет аккаунта? Зарегистрироваться.';
          REG_FORM.style.display = 'none';
          AUTH_FORM.style.display = '';
        } else {
          Switch.querySelector('h3').innerText = 'Уже есть аккаунт? Войти.';
          AUTH_FORM.style.display = 'none';
          REG_FORM.style.display = '';
        }
      }
      setElement(FORMS_STATE);

      function setState(state) {
        FORMS_STATE = state;
        setElement(FORMS_STATE);
      }

      const changeFormsState = () => {
        if (FORMS_STATE === false) {
          setState(true);
        } else {
          setState(false);
        }
      };
    </script>
</body>


<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>