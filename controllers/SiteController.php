<?php

namespace app\controllers;

use app\models\SignUp;
use app\models\Login;
use app\models\AddFeedback;
use app\models\Feedback;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class SiteController extends Controller
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
  public function actionIndex()

  {
    $this->layout = 'base';

    return $this->render('index');
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionAuth()

  {
    $this->layout = 'base';
    $modelReg = new SignUp();
    $modelReg->typeUser = 'User';
    if (isset($_POST['SignUp'])) {
      $modelReg->attributes = Yii::$app->request->post('SignUp');
    }
    if ($modelReg->validate() &&  $modelReg->signup()) {
      return $this->redirect('auth');
    }
    // auth
    if (!Yii::$app->user->isGuest) {
      return $this->redirect('dashbord');
    }
    $login_model = new Login();
    if (Yii::$app->request->post('Login')) {
      $login_model->attributes = Yii::$app->request->post('Login');
      if ($login_model->validate()) {
        setcookie("Auth", "true");
        Yii::$app->user->login($login_model->getUser());
        $us = $login_model->getUser();
        if ($us['typeUser'] !== 'Admin') {
          return $this->redirect(['users/profile']);
        } else {
          return $this->redirect(['site/admin']);
        };
      }
    }
    return $this->render('auth', ['modelReg' => $modelReg, 'login_model' => $login_model]);
  }

  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionDashbord()
  {
    return $this->render('dashbord');
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionFeedback()
  {
    $userData = Yii::$app->user->identity;
    $model = new AddFeedback();
    $model->user = $userData['id'];
    $model->date = date('Y-m-d');;
    if (isset($_POST['AddFeedback'])) {
      $model->attributes = Yii::$app->request->post('AddFeedback');
    }
    if ($model->validate() &&  $model->Add()) {
      return $this->redirect(['site/feedback']);
    }
    return $this->render('feedback', ['model' => $model]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionDeletefeed($id)
  {
    $model = Feedback::findOne($id);
    if ($model) {
      $model->delete();
    }
    return $this->redirect(['site/admin']);
  }
  /**
   * Displays about page.
   *
   * @return string
   */
  public function actionError()
  {
    return $this->render('error');
  }
  /**
   * Displays about page.
   *
   * @return string
   */
  public function actionAdmin()
  {
    return $this->render('admin');
  }
}
