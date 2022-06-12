<?php

namespace app\models;

use app\models\Subscribes_invent;
use yii\base\Model;

class SubscribesAdd extends Model
{

  public  $id_user;
  public  $id_invent;


  public function subscribies()
  {
    $sub = new Subscribes_invent();
    $sub->id_user = $this->id_user;
    $sub->id_invent = $this->id_invent;
    return $sub->save();
  }
}
