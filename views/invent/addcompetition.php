<?php

/** @var yii\web\View $this */

$this->title = 'Sport | добавить соревнование';

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<h1>Добавить соревнование</h1>
<?php $form = ActiveForm::begin([]); ?>
<p>Введите данные</p>

<?= $form->field($model, 'title')->textInput(['class' => 'field-main', 'placeholder' => 'Заголовок'])->label('') ?>
<?= $form->field($model, 'image')->textInput(['class' => 'field-main', 'placeholder' => 'Изображение'])->label('') ?>
<?= $form->field($model, 'description')->textarea(['class' => 'textarea-main', 'placeholder' => 'Подзаголовок'])->label('') ?>
<?= $form->field($model, 'text')->textarea(['class' => 'textarea-main', 'placeholder' => 'Текст'])->label('') ?>

<button type="submit" class="button-main">Добавить</button>
<?php ActiveForm::end(); ?>
<button onclick="window.history.back()" class="button-back">Назад</button>
</div>