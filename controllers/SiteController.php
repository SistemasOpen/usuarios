<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Usuario;
use app\models\Pdfcargarbeneficios;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','login'],
                 'rules' => [
                        [
                            'actions' => ['login'],
                            'allow' => true,
                            'roles' => ['?'],
                        ],
                        [
                            'actions' => ['about', 'logout', 'index'],
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

    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['usuario/index']);
        }
         return $this->redirect(['/site/login']);
        //return $this->redirect(['usuario/ingreso']);

        //return $this->render('index');

    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }




    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCargarbeneficios()
    {
        $imageModel = new Pdfcargarbeneficios();
        if (Yii::$app->request->post()) {
            
            $imageModel->image = UploadedFile::getInstance($imageModel,'image');

            $imageModel->image->saveAs('plantillas/beneficios.pdf');

            return $this->redirect(['/memo/ultimasnovedades']);
//            }
//            else{
//                return $this->render('cargarbeneficios', [
//                    'imageModel'    =>  $imageModel,
//                ]);
//            }
        } 
        else
        {
            return $this->render('cargarbeneficios', [
                'imageModel'    =>  $imageModel,
            ]);
        }

    }


}
