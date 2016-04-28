<?php

namespace app\controllers;

use Yii;
use app\models\Memosector;
use app\models\MemosectorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MemosectorController implements the CRUD actions for Memosector model.
 */
class MemosectorController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Memosector models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemosectorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Memosector model.
     * @param integer $memo
     * @param integer $sector
     * @return mixed
     */
    public function actionView($memo, $sector)
    {
        return $this->render('view', [
            'model' => $this->findModel($memo, $sector),
        ]);
    }

    /**
     * Creates a new Memosector model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Memosector();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'memo' => $model->memo, 'sector' => $model->sector]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Memosector model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $memo
     * @param integer $sector
     * @return mixed
     */
    public function actionUpdate($memo, $sector)
    {
        $model = $this->findModel($memo, $sector);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'memo' => $model->memo, 'sector' => $model->sector]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Memosector model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $memo
     * @param integer $sector
     * @return mixed
     */
    public function actionDelete($memo, $sector)
    {
        $this->findModel($memo, $sector)->delete();
        $this->findModel($memo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Memosector model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $memo
     * @param integer $sector
     * @return Memosector the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($memo, $sector)
    {
        if (($model = Memosector::findOne(['memo' => $memo, 'sector' => $sector])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGrabarsectoresmemo()
    {
        $memo = Yii::$app->request->get('memo');
        
     
        $models =  Memosector::find()->where(['memo' => $memo])->All();
        foreach ($models AS $model)
        {
            $model->delete();            
        }

        $seleccion = Yii::$app->request->post('keys');

        print_r($seleccion);exit;

        foreach ($seleccion as $elegido)
        {
            $models->memo = Yii::$app->request->get('memo');     
            $models->sector = $elegido;
            $models-save();
        }

        return $this->redirect(['index']);
    }

    public function actionAgregar()
    {
        $model = new Memosector();

        $seleccion = \yii\helpers\Json::decode(Yii::$app->request->post('keys'));

        foreach ($seleccion as $elegido)
        {
            $model->memo = Yii::$app->request->get('memo');     
            $model->sector = $elegido;
            $model-save();
        }

        return $this->redirect(['index']);

    }

    public function actionObtenerseleccion()
    {
        $seleccion = \yii\helpers\Json::decode(Yii::$app->request->post('memo'));
        
    }


}
