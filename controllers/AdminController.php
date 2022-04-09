<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class AdminController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout'],
        'rules' => [
          [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'logout' => ['post'],
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
    ];
  }

  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionAdmin()

  {
    $this->layout = 'adminLayout';
    return $this->render('admin');
  }

  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionCurseadmin()
  {
    $this->layout = 'adminLayout';
    return $this->render('curseadmin');
  }

  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionUsersadmin()
  {
    $this->layout = 'adminLayout';
    return $this->render('usersadmin');
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionWordsadmin()
  {
    $this->layout = 'adminLayout';
    return $this->render('wordsadmin');
  }
}
