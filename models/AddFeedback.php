<?php

namespace app\models;

use yii\base\Model;

class AddFeedback extends Model
{

  public  $text;
  public  $user;
  public  $date;
  public function rules()
  {
    return [
      [['text', 'user', 'date'], 'required', 'message' => 'Заполните поле...'],

    ];
  }
  public function Add()
  {
    $feedback = new Feedback();
    $feedback->date = $this->date;
    $feedback->user = $this->user;
    $feedback->text = $this->text;
    return $feedback->save();
  }
}
