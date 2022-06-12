<?php

namespace app\models;

use app\models\User;

use yii\base\Model;
use yii;

/**
 * UserUpdate form
 */
class UserUpdate extends Model
{
  public $email;
  public $firstname;
  public $lastname;
  /**
   * @var User
   */
  private $_user;

  public function __construct(User $user, $config = [])
  {
    $this->_user = $user;
    $this->email = $user->email;
    $this->firstname = $user->firstname;
    $this->lastname = $user->lastname;
    parent::__construct($config);
  }

  public function rules()
  {
    return [
      ['email', 'required'],
      ['firstname', 'required'],
      ['lastname', 'required'],
      ['email', 'email'],
      [
        'email',
        'unique',
        'targetClass' => User::className(),
        'message' => Yii::t('app', 'ERROR_EMAIL_EXISTS'),
        'filter' => ['<>', 'id', $this->_user->id],
      ],
      [['email', 'firstname', 'lastname'], 'string', 'max' => 255],
    ];
  }

  public function update()
  {
    if ($this->validate()) {
      $user = $this->_user;
      $user->email = $this->email;
      $user->firstname = $this->firstname;
      $user->lastname = $this->lastname;
      return $user->save();
    } else {
      return false;
    }
  }
}
