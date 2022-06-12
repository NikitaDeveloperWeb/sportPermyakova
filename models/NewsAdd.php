<?php

namespace app\models;

use yii\base\Model;

class NewsAdd extends Model
{

  public  $title;
  public  $subtitle;
  public  $date;
  public  $text;
  public $autor;
  public $image;
  public function rules()
  {
    return [
      [['title', 'subtitle', 'date', 'text','image'], 'required', 'message' => ''],

    ];
  }
  public function Add()
  {
    $news = new News();
    $news->title = $this->title;
    $news->subtitle = $this->subtitle;
    $news->date = $this->date;
    $news->text = $this->text;
    $news->image = $this->image;
    $news->autor = $this->autor;
    return $news->save();
  }
}
