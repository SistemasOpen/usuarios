<?php

namespace app\modules\administracion\controllers;

use Yii;
use app\modules\administracion\models\Encuesta;
use app\modules\administracion\models\EncuestaSearch;
use app\modules\administracion\models\Tipomovimiento;
use app\modules\administracion\models\Registro;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

/**
 * EncuestasController implements the CRUD actions for Encuesta model.
 */
class EncuestasController extends Controller
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
     * Lists all Encuesta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EncuestaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Encuesta model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Encuesta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Encuesta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $registro = new Registro();
            $registro->usuario = Yii::$app->user->identity->legajo;
            $registro->fecha = date('Ymd');
            $registro->tipomovimiento = 1; //generar una nueva encuesta esta fijo por tabla
            $registro->encuesta = $model->id;
            $registro->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Encuesta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $registro = new Registro();
            $registro->usuario = Yii::$app->user->identity->legajo;
            $registro->fecha = date('Ymd');
            $registro->tipomovimiento = 3; //modificar encuesta esta fijo por tabla
            $registro->encuesta = $id;
            $registro->save();

            return $this->redirect(['encuestacontenido/armarencuesta', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Encuesta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Encuesta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Encuesta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Encuesta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionEvaluador($id)
    {

        return $this->render('evaluadorevaluado');
    }
    
    public function actionCategorias($id){
        
        echo json_encode(ArrayHelper::map(Categorias::find()->all(), 'Id', 'Descripcion'));
        //echo json_decode($DPartList->models);
    }

    public function actionPublicarencuesta($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                $registro = new Registro();
                $registro->usuario = Yii::$app->user->identity->legajo;
                $registro->fecha = date('Ymd');
                $registro->tipomovimiento = 5; //publicar encuesta esta fijo por tabla
                $registro->observaciones = 'Vigencia: ' . $model->fDesde . ' hasta ' . $model->fHasta;
                $registro->encuesta = $id;
                $registro->save();

            return $this->redirect(['encuestaspublicadas']);
        } else {
            return $this->render('publicarencuesta', [
                'model' => $model,
                ]);
        }
    }

    public function actionEncuestaspublicadas()
    {

        $searchModel = new EncuestaSearch();
        $dataProvider = $searchModel->publicadas(Yii::$app->request->queryParams);

        return $this->render('encuestaspublicadas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

        /*
        $model = Encuesta::find()->where("fDesde <> ''")->All();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $model,
            ]);        

        return $this->render('encuestaspublicadas', [
            'searchModel' => $model,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
        */
    }

    public function actionCancelarpublicacion()
    {
        $encuesta = Yii::$app->request->get('id');

        if ($encuesta != 0)
        {

            $modelo = Encuesta::find()->where('id = ' . $encuesta)->One();

            $registro = new Registro();
            $registro->usuario = Yii::$app->user->identity->legajo;
            $registro->fecha = date('Ymd');
            $registro->tipomovimiento = 6; //cancelar encuesta esta fijo por tabla
            $registro->observaciones = 'Vigencia: ' . $modelo->fDesde . ' hasta ' . $modelo->fHasta;
            $registro->encuesta = $encuesta;
            $registro->save();

            $modelo->fDesde = date('Ymd') - 1;
            $modelo->fHasta = date('Ymd') - 1;
            $modelo->visible = 1;
            $modelo->save();
        }

        $model = Encuesta::find()->where("fDesde <> ''")->All();
        $dataProvider = new ArrayDataProvider([
            'allModels' => $model,
            ]);        

        return $this->render('encuestaspublicadas', [
            'searchModel' => $model,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionEncuestasfinalizadas()
    {

        $searchModel = new EncuestaSearch();
        $dataProvider = $searchModel->finalizadas(Yii::$app->request->queryParams);

        return $this->render('encuestasfinalizadas', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

}
