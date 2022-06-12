<?php

namespace app\controllers;

use app\models\Competition;
use app\models\CompetitionAdd;
use app\models\Invent;
use app\models\InventAdd;
use app\models\SubscribesAdd;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class InventController extends Controller
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
  public function actionInvent()

  {
    return $this->render('invent');
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionDeleteinvent($id)
  {
    $model = Invent::findOne($id);
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
  public function actionDeletecompetition($id)
  {
    $model = Competition::findOne($id);
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
  public function actionInventstr($id)
  {
    $invent = Invent::findOne($id);
    return $this->render('inventstr', ['invent' => $invent]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionAddinvent()
  {
    $userData = Yii::$app->user->identity;
    $model = new InventAdd();
    $model->author = $userData['id'];
    if (isset($_POST['InventAdd'])) {
      $model->attributes = Yii::$app->request->post('InventAdd');
    }
    if ($model->validate() &&  $model->Add()) {
      return $this->redirect(['site/admin']);
    }
    return $this->render('addinvent', ['model' => $model]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionAddcompetition($id)
  {
    $userData = Yii::$app->user->identity;
    $model = new CompetitionAdd();
    $model->invent = $id;
    if (isset($_POST['CompetitionAdd'])) {
      $model->attributes = Yii::$app->request->post('CompetitionAdd');
    }
    if ($model->validate() &&  $model->Add()) {
      return $this->redirect(['site/admin']);
    }
    return $this->render('addcompetition', ['model' => $model]);
  }
  /**
   * Displays homepage.
   *
   * @return string
   */
  public function actionCompetition($id)
  {
    $competition = Competition::findOne($id);
    return $this->render('competition', ['competition' => $competition]);
  }


  // Subscribies 
  public function actionSubscribies($idUser, $idInvent)
  {
    $modelSub = new SubscribesAdd();
    $modelSub->id_invent = $idInvent;
    $modelSub->id_user = $idUser;
    if (isset($_POST['SubscribesAdd'])) {
      $modelSub->attributes = Yii::$app->request->post('SubscribesAdd');
    }
    if ($modelSub->validate() &&  $modelSub->subscribies()) {
      return $this->redirect('invent');
    }
    return $this->render('invent');
  }
  // unscribies
  public function actionUnsubscribies($idUser, $idInvent)
  {
    $subItem = Yii::$app->db->createCommand()
      ->delete('subscribes_invent', 'id_user = ' . $idUser . '  AND id_invent = ' . $idInvent);
    $subItem->execute();
    return $this->render('invent');
  }
}
