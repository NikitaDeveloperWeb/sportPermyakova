<?php

namespace app\models;

use yii\base\Model;

class CompetitionAdd extends Model
{

  public  $title;
  public  $text;
  public  $description;
  public $invent;
  public $image;
  public function rules()
  {
    return [
      [['title', 'description', 'invent', 'text', 'image'], 'required', 'message' => ''],

    ];
  }
  public function Add()
  {
    $news = new Competition();
    $news->title = $this->title;
    $news->description = $this->description;
    $news->invent = $this->invent;
    $news->text = $this->text;
    $news->image = $this->image;
    return $news->save();
  }
}
