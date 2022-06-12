<?php

/** @var yii\web\View $this */

$this->title = 'Sport | новость';

use yii\helpers\Url;
?>

<h1><?= $news['title'] ?></h1>
<?php

?>
<div class="news-full">

  <p><?= $news['text'] ?>
  </p>
  <img src=<?= $news['image'] ?> alt="" srcset="">
  <p><?= $news['date'] ?> г.</p>
  <button onclick="window.history.back()" class="button-back">Назад</button>

</div>