<?php

namespace app\modules\administracion\controllers;

use Yii;
use app\modules\administracion\models\Encuestacontenido;
use app\modules\administracion\models\Competenciadescripcion;
use app\modules\administracion\models\EncuestacontenidoSearch;
use app\modules\administracion\models\Encuesta;
use app\modules\administracion\models\Tipomovimiento;
use app\modules\administracion\models\Registro;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

/**
 * EncuestacontenidoController implements the CRUD actions for Encuestacontenido model.
 */
class EncuestacontenidoController extends Controller
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
     * Lists all Encuestacontenido models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EncuestacontenidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Encuestacontenido model.
     * @param integer $idCompetencia
     * @param integer $idEncuesta
     * @return mixed
     */
    public function actionView($idCompetencia, $idEncuesta)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCompetencia, $idEncuesta),
        ]);
    }

    /**
     * Creates a new Encuestacontenido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Encuestacontenido();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCompetencia' => $model->idCompetencia, 'idEncuesta' => $model->idEncuesta]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Encuestacontenido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idCompetencia
     * @param integer $idEncuesta
     * @return mixed
     */
    public function actionUpdate($idCompetencia, $idEncuesta)
    {
        $model = $this->findModel($idCompetencia, $idEncuesta);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCompetencia' => $model->idCompetencia, 'idEncuesta' => $model->idEncuesta]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Encuestacontenido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idCompetencia
     * @param integer $idEncuesta
     * @return mixed
     */
    public function actionDelete($idCompetencia, $idEncuesta)
    {
        $this->findModel($idCompetencia, $idEncuesta)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Encuestacontenido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idCompetencia
     * @param integer $idEncuesta
     * @return Encuestacontenido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCompetencia, $idEncuesta)
    {
        if (($model = Encuestacontenido::findOne(['idCompetencia' => $idCompetencia, 'idEncuesta' => $idEncuesta])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionArmarencuesta()
    {

        $model = new Encuestacontenido();
        //$modelenc = new Encuesta();

        $encuesta = Yii::$app->request->get('id');

        $orden = '';
        if ($model->load(Yii::$app->request->post())) {

            $orden = Yii::$app->request->post('Encuestacontenido');
            $encuestaid = Yii::$app->request->post('idEncuesta');

            $modelo = Encuestacontenido::find()->where('idEncuesta =  ' . $encuestaid . 'and idCompetencia =' . $orden['idCompetencia'])->one();

            if ($modelo)
            {
                 Yii::$app->session->setFlash('danger','La competencia de la encuesta ya fue cargada');
            }
            else
            {
                 $tipocomp = Competenciadescripcion::find()->where('id = '. $orden['idCompetencia'])->one();

                $model->idEncuesta = $encuestaid;
                $model->idCompetencia = $orden['idCompetencia'];
                $model->tipocompetencia = $tipocomp['idTipoComp'];   
                $model->save();

                $tipocomp = Tipocompetencia::find()->where('id = ' . '$idCompetencia')->one();

                $registro = new Registro();
                $registro->usuario = Yii::$app->user->identity->legajo;
                $registro->fecha = date('Ymd');
                $registro->tipomovimiento = 7; //agregar item de encuesta esta fijo por tabla
                $registro->observaciones = 'Competencia: ' . $tipocomp->descripcion . ' eliminada';
                $registro->encuesta = $encuestaid;
                $registro->save();


                $model = new Encuestacontenido();
                $model2 =  Encuestacontenido::find()->where('idEncuesta = '. $encuestaid)->orderby('tipocompetencia')->all();
                $modelenc = Encuesta::find()->where('id ='. $encuesta)->One();

                $dataProvider = new ArrayDataProvider([
                'allModels' => $model2,
                ]);

                return $this->render('armarencuesta', [
                'model' => $model,
                'modelenc' => $modelenc,
                'searchModel' => $model2,
                'dataProvider' => $dataProvider,
                'id'=>$encuesta,
            ]);        

            }
        } 
              $modelenc = Encuesta::find()->where('id ='. $encuesta)->One();
              $model = new Encuestacontenido();
              $model2 =  Encuestacontenido::find()->where('idEncuesta ='.$encuesta)->orderby('tipocompetencia')->all();
              $dataProvider = new ArrayDataProvider([
              'allModels' => $model2,
              ]);
                return $this->render('armarencuesta', [
                'model' => $model,
                'modelenc' => $modelenc,
                'searchModel' => $model2,
                'dataProvider' => $dataProvider,
                'id'=>$encuesta,
            ]);        

    }

    public function actionBorrar($idEncuesta, $idCompetencia)
    {

/*        $ingresado = 0;

        $modelo = Encuestacontenido::find()->where('idEncuesta =' . $idEncuesta .' and idCompetencia =' . $idCompetencia)->all();
        foreach ($modelo as $key) {
            if ($key['idCompetencia']==$idCompetencia){
                $ingresado = 1; 
                Yii::$app->session->setFlash('danger','El pedido ya fue entregado');
            }
        };

        if ($ingresado <> 1)
        {
            */
            $modelenc = new Encuesta(); 

            $modelo = Encuestacontenido::find()->where('idEncuesta =' . $idEncuesta . ' and idCompetencia =' . $idCompetencia)->one();
            if ($modelo)
            {

                $tipocomp = Tipocompetencia::find()->where('id = ' . '$idCompetencia')->one();

                $registro = new Registro();
                $registro->usuario = Yii::$app->user->identity->legajo;
                $registro->fecha = date('Ymd');
                $registro->tipomovimiento = 8; //eliminar item de encuesta esta fijo por tabla
                $registro->observaciones = 'Competencia: ' . $tipocomp->descripcion . ' eliminada';
                $registro->encuesta = $idEncuesta;
                $registro->save();

                $modelo->delete();
        

            }

            $model = new Encuestacontenido();
            $modelenc = Encuesta::find()->where('id ='. $idEncuesta)->One();
            $model2 =  Encuestacontenido::find()->where('idEncuesta =' . $idEncuesta)->orderby('tipocompetencia')->all();
            $dataProvider = new ArrayDataProvider([
            'allModels' => $model2,
            'id'=>$idEncuesta,
            ]);

            return $this->redirect(['armarencuesta','id'=>$idEncuesta]);            
            /*
             return $this->render('ingresarestado', [
                'model' => $model,
                'searchModel' => $model2,
                'dataProvider' => $dataProvider,
            ]);        
            */
//        }
//        else
/*        {
              $model = new Encuestacontenido();
              $model2 =  Encuestacontenido::find()->where('idEncuesta =' . $idEncuesta)->orderby('tipocompetencia')->all();
              $dataProvider = new ArrayDataProvider([
              'allModels' => $model2,
              ]);
              return $this->redirect(['armarencuesta']);            
/*                return $this->render('ingresarestado', [
                'model' => $model,
                'searchModel' => $model2,
                'dataProvider' => $dataProvider,
            ]);        
            */

        //}

    }    

    public function actionEliminarencuesta()
    {

        $idEncuesta = Yii::$app->request->get('id');
        $modeloenc = Encuesta::find()->where('id ='. $idEncuesta)->One();

        $registro = new Registro();
        $registro->usuario = Yii::$app->user->identity->legajo;
        $registro->fecha = date('Ymd');
        $registro->tipomovimiento = 2; //tipo de movimiento eliminar encuesta esta fijo por tabla
        $registro->observaciones = 'Encuesta: ' . $idEncuesta . ' ' . $modeloenc->descripcion;
        $registro->encuesta = $idEncuesta;
        $registro->save();
            
        $modelo = Encuestacontenido::find()->where('idEncuesta =' . $idEncuesta)->all();
        foreach ($modelo as $key) {
            $key->delete();
        };     

        $modeloenc = Encuesta::find()->where('id ='. $idEncuesta)->One();
        $modeloenc->delete();

        return $this->redirect(['encuestas/index']);            
    }    


    public function actionDuplicarencuesta()
    {


        $nmodelenc = new Encuesta();

        $encuesta = Yii::$app->request->get('id');

        $modeloenc = Encuesta::find()->where('id = ' . $encuesta)->One();
        $modelo = Encuestacontenido::find()->where('idEncuesta =  ' . $encuesta)->All();

        $DateTime = getdate();

        $nmodelenc->idTipoEncuesta = $modeloenc->idTipoEncuesta;
        $nmodelenc->descripcion = $modeloenc->descripcion . ' dup ' . $DateTime ['year'];
        $nmodelenc->idRango = $modeloenc->idRango;
        $nmodelenc->visible = 0;
        $nmodelenc->save();

        foreach($modelo as $nmodelo)
        {
          $nmodel = new Encuestacontenido();
          $nmodel->idEncuesta = $nmodelenc->id;
          $nmodel->idCompetencia = $nmodelo->idCompetencia;
          $nmodel->tipocompetencia = $nmodelo->tipocompetencia;
          $nmodel->save();
        }

        $registro = new Registro();
        $registro->usuario = Yii::$app->user->identity->legajo;
        $registro->fecha = date('Ymd');
        $registro->tipomovimiento = 4; //tipo de movimiento duplicar encuesta esta fijo por tabla
        $registro->observaciones = 'Encuesta ' . $nmodelenc->id . ' ' . $modeloenc->descripcion;
        $registro->encuesta = $nmodelenc->id;
        $registro->save();

        Yii::$app->session->setFlash('duplicada','Se generó una nueva encuesta');

        return $this->redirect(['armarencuesta','id'=>$nmodelenc->id]);            

    }

}
