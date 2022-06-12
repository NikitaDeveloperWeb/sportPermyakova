<?php

namespace app\models;

use yii\base\Model;

class InventAdd extends Model
{

  public  $title;
  public  $description;
  public $author;
  public function rules()
  {
    return [
      [['title', 'description'], 'required', 'message' => ''],

    ];
  }
  public function Add()
  {
    $news = new Invent();
    $news->title = $this->title;
    $news->description = $this->description;
    $news->author = $this->author;
    return $news->save();
  }
}
