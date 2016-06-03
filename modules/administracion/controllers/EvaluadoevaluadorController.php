<?php

namespace app\modules\administracion\controllers;

use Yii;
use app\modules\administracion\models\Evaluadoevaluador;
use app\modules\administracion\models\EvaluadoevaluadorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use app\models\Usuario;

/**
 * EvaluadoevaluadorController implements the CRUD actions for EvaluadoEvaluador model.
 */
class EvaluadoevaluadorController extends Controller
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
     * Lists all EvaluadoEvaluador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EvaluadoevaluadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EvaluadoEvaluador model.
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
     * Creates a new EvaluadoEvaluador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Evaluadoevaluador();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EvaluadoEvaluador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EvaluadoEvaluador model.
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
     * Finds the EvaluadoEvaluador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EvaluadoEvaluador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Evaluadoevaluador::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAsignarlegajos()        
    {
        if(Yii::$app->request->post('id'))
        {
            if(Yii::$app->user->identity->sucursal && Yii::$app->user->identity->categorialegajo = 22) 
            {

                $encuesta = Yii::$app->request->post('id');
                $sql = "pa_enc_mostrarevaluado ". $encuesta.", ". Yii::$app->user->identity->sucursal;
                $resultado = Yii::$app->get('dbIntranet')->createCommand($sql)->queryAll();

               $dataProvider = new ArrayDataProvider([
                        'allModels' => $resultado,
                        'sort' => [
                            'attributes' => ['legajo'],
                        ],
                        'pagination' => [
                            'pageSize' => 20,
                        ],
                ]);
                return $this->render('asignarlegajos', [
                    'dataProvider' => $dataProvider,
                    'idEncuesta' => $encuesta
                ]);     
            }           
            else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }

        } 
//        elseif (Yii::$app->request->post('selection'))
        elseif (Yii::$app->request->post('selection'))
        {

            $seleccion = Yii::$app->request->post('selection');

            $resultado = Evaluadoevaluador::find()->where("encuesta = " . Yii::$app->request->post('encuesta') ." and (evaluador = " . Yii::$app->user->identity->id ." )")->All();

            foreach($resultado as $result)
            {

                $result->evaluador = 0;
                $result->save();
            }


            foreach($seleccion as $selecc)
            {
                $resultado = Evaluadoevaluador::find()->where("encuesta = " . Yii::$app->request->post('encuesta') ." and (evaluado = " . $selecc ." )")->one();

                $resultado->evaluador = Yii::$app->user->identity->id;
                $resultado ->save();
            }
            
            return $this->redirect(['asignarlegajos']);     
        }
        else
        {
                $sql = "select e.id, e.idtipoencuesta, descttipoenc = te.descripcion, encuesta = e.descripcion, e.fDesde, e.fHasta
                        from encEncuesta e inner join encTipoEncuesta te on e.idTipoEncuesta = te.id 
                        where (fhasta is null)";

                $resultado = Yii::$app->get('dbIntranet')->createCommand($sql)->queryAll();

               $dataProvider = new ArrayDataProvider([
                        'allModels' => $resultado,
                        'sort' => [
                            'attributes' => ['id'],
                        ],
                        'pagination' => [
                            'pageSize' => 20,
                        ],
                ]);
                return $this->render('seleccionarencuesta', [
                    'resultado' => $resultado,
                ]);     

        }
        

    }
}
