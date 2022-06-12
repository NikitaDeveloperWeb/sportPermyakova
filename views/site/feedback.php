<?php

/** @var yii\web\View $this */

$this->title = 'Sport | обратная связь';

use yii\widgets\ActiveForm;
use yii\helpers\Url;

$userData = Yii::$app->user->identity;
?>
<h1>Обратная связь</h1>
<?php $form = ActiveForm::begin([]); ?>
<p>Введите ваше сообщение...</p>

<?= $form->field($model, 'text')->textarea(['class' => 'textarea-main', 'placeholder' => 'Текст'])->label('') ?>

<button type="submit" class="button-main">Отправить</button>
<?php ActiveForm::end(); ?>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>