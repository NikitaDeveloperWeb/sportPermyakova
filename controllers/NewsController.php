<?php

namespace app\controllers;

use app\models\News;
use app\models\NewsAdd;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class NewsController extends Controller
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
  public function actionNews($id)
  {
    $news = News::findOne($id);
    return $this->render('news', ['news' => $news]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionDeletenews($id)
  {
    $model = News::findOne($id);
    if ($model) {
      $model->delete();
    }
    return $this->redirect(['site/admin']);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionAddnews()
  {
    $userData = Yii::$app->user->identity;
    $model = new NewsAdd();
    $model->autor = $userData['id'];
    if (isset($_POST['NewsAdd'])) {
      $model->attributes = Yii::$app->request->post('NewsAdd');
    }
    if ($model->validate() &&  $model->Add()) {
      return $this->redirect(['site/admin']);
    }
    return $this->render('addnews', ['model' => $model]);
  }
}
