<?php

namespace app\modules\administracion\controllers;

use Yii;
use app\modules\administracion\models\Encuesta;
use app\modules\administracion\models\EncuestaSearch;
use app\modules\administracion\models\Tipomovimiento;
use app\modules\administracion\models\Registro;
use app\modules\administracion\models\Evaluadoevaluador;
use app\modules\administracion\models\Encuestadetalle;
use app\modules\administracion\models\Encuestavalores;
use app\modules\administracion\models\Encuestapublica;
use app\modules\administracion\models\Encuestaaspecto;
use app\modules\administracion\models\Encuestaobjetivo;
use app\models\Usuario;
use app\models\Sectores;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;

/**
 * EncuestasController implements the CRUD actions for Encuesta model.
 */
class EncuestasController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [ 'logout',
                            'index',
                            'view',
                            'create',
                            'update',
                            'delete',
                            'categorias',
                            'evaluador',
                            'publicarencuesta',
                            'encuestaspublicadas',
                            'cancelarpublicacion',
                            'encuestasfinalizadas',
                            'encuestashabilitadas',
                            'completarencuestafuncional',
                            'mostrarfuncioncompleta',
                            'mostrarresultadosencuestafuncional',
                            'actualizardetalle',
                            'completaraspectos',
                            'completarobjetivo',
                            'completargracias',
                            'finalizarencuesta'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
    public function actionIndex() {
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
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Encuesta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Encuesta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $registro = new Registro();
            $registro->usuario = Yii::$app->user->identity->id;
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
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $registro = new Registro();
            $registro->usuario = Yii::$app->user->identity->id;
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
    public function actionDelete($id) {
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
    protected function findModel($id) {
        if (($model = Encuesta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionEvaluador($id) {

        return $this->render('evaluadorevaluado');
    }

    public function actionCategorias($id) {

        echo json_encode(ArrayHelper::map(Categorias::find()->all(), 'Id', 'Descripcion'));
        //echo json_decode($DPartList->models);
    }

    public function actionPublicarencuesta($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->get('dbIntranet')->createCommand('SET QUOTED_IDENTIFIER ON; SET ANSI_WARNINGS ON')->execute();
            $resultado = Yii::$app->get('dbIntranet')->createCommand('pa_enc_grabaPublica ' . $model->id)->queryOne();
            $nimport = count($resultado);

            if ($nimport > 0)
                Yii::$app->session->setFlash('success', 'La encuesta fue publicada con éxito');
//             else
//            Yii::$app->session->setFlash('success','Ya fueron importados todos los usuarios.');  

            $registro = new Registro();
            $registro->usuario = Yii::$app->user->identity->id;
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

    public function actionEncuestaspublicadas() {

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

    public function actionCancelarpublicacion() {
        $encuesta = Yii::$app->request->get('id');

        if ($encuesta != 0) {

            $modelo = Encuesta::find()->where('id = ' . $encuesta)->One();

            $registro = new Registro();
            $registro->usuario = Yii::$app->user->identity->id;
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

    public function actionEncuestasfinalizadas() {

        $searchModel = new EncuestaSearch();
        $dataProvider = $searchModel->finalizadas(Yii::$app->request->queryParams);

        return $this->render('encuestasfinalizadas', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEncuestashabilitadas() {
        try {

            if (Yii::$app->user->isGuest)
                $this->redirect(Yii::$app->urlManager->createUrl(['site/login']));

            $sql1 = 'pa_enc_encuestas_habilitadas ' . Yii::$app->user->identity->id;
            $command1 = Yii::$app->dbIntranet->createCommand($sql1);
            $list1 = $command1->queryAll();
        } catch (Exception $e) {
            Log::trace("Error : " . $e);
            throw new Exception("Error : " . $e);
        }

        if (count($list1) == 0)
            Yii::$app->session->setFlash('error', 'No se encuentran Encuestas para Completar');

        $dpDatos1 = new ArrayDataProvider(['allModels' => $list1]);
        return $this->render('encuestashabilitadas', ['model' => $dpDatos1]);
    }

    public function actionCompletarencuestafuncional($id, $fun) {
        try {

            $session = yii::$app->session;
            $session['encuesta'] = ['idEncuesta' => $id];


            $model = Encuestadetalle::find()->where('idpublica = ' . $id)->All();
            if ($model == null) {
                $sql1 = 'pa_enc_insertar_detalle_aspectos_objetivos ' . $id;
                $command1 = Yii::$app->dbIntranet->createCommand($sql1);
                $command1->execute();
            }

            $sql1 = 'pa_enc_ver_cabeza ' . $id;
            $command1 = Yii::$app->dbIntranet->createCommand($sql1);
            $list1 = $command1->queryAll();

            $sql2 = 'pa_enc_ver_detalle ' . $id . ', ' . $fun;
            $command2 = Yii::$app->dbIntranet->createCommand($sql2);
            $list2 = $command2->queryAll();
        } catch (Exception $e) {
            Log::trace("Error : " . $e);
            throw new Exception("Error : " . $e);
        }

        if (count($list2) > 0) {

            $session['encuesta'] = ['idEncuesta' => $id, 'idfun' => $fun, 'descfun' => $list2[0]['Funcion']];

            $dpDatos1 = new ArrayDataProvider(['allModels' => $list1]);
            $dpDatos2 = new ArrayDataProvider(['allModels' => $list2]);
            $dpDatos2->pagination = false;
            return $this->render('completarencuesta', ['cabeza' => $dpDatos1,
                        'detalle' => $dpDatos2,
                        'id' => $id,
                        'rango' => $list2[0]['Rango'],
                        'inicio' => '1',
            ]);
        } else {
            //Yii::$app->runAction('mostrarresultadosencuestafuncional', ['id' => $id]);
            try {

                $sql1 = 'pa_enc_mostrar_resultados_encuesta ' . $id;
                $command1 = Yii::$app->dbIntranet->createCommand($sql1);
                $list1 = $command1->queryAll();

                if (count($list1) > 0) {
                    $session = yii::$app->session;
                    $session['encuesta'] = ['idEncuesta' => $id, 'idfun' => '0', 'descfun' => ''];

                    $total = 0;
                    for ($i = 0; $i < count($list1); $i++) {
                        $total += $list1[$i]['Totales'];
                    }

                    $valor = Array('id' => (count($list1) + 1), 'Competencia' => 'Total Competencias', 'Totalfun' => '', 'Cantfun' => '', 'Ponderacion' => '', 'Subtotal' => '', 'Totales' => $total);
                    array_push($list1, $valor);

                    $model = new ArrayDataProvider(['allModels' => $list1]);
                    return $this->render('mostrarresultadosencuesta', [ 'model' => $model, 'id' => $id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Faltan completar Items, por favor completelos');
                    return $this->redirect(['completarencuesta', 'id' => $id, 'fun' => '1']);
                }
            } catch (Exception $e) {
                Log::trace("Error : " . $e);
                throw new Exception("Error : " . $e);
            }
        }
    }

    public function actionMostrarfuncioncompleta($fun) {

        try {
            //Recupero la encuesta Activa
            $session = yii::$app->session;
            $id = $session['encuesta']['idEncuesta'];

            //recupero los valores items totales de la encuesta y los que estan completos
            $sql1 = 'pa_enc_verificar_encuesta_completa ' . $id . ', ' . $fun;
            $command1 = Yii::$app->dbIntranet->createCommand($sql1);
            $list1 = $command1->queryOne();

            //Si estan todo completos
            if ($list1['todos'] == $list1['completos']) {
                $sql2 = 'pa_enc_sumar_encuesta_completa ' . $id . ', ' . $fun;
                $command2 = Yii::$app->dbIntranet->createCommand($sql2);
                $total = $command2->queryScalar();

                if ($total > 0) {
                    $total = ($total / $list1['todos']);
                    return $this->render('mostrarencuestacompleta', [ 'id' => $id,
                                'funcion' => $fun,
                                'todos' => $list1['todos'],
                                'puntos' => number_format($total, 2, ",", ".")]);
                }
            } else {
                Yii::$app->session->setFlash('error', 'Faltan completar Items, por favor completelos');
                return $this->redirect(['completarencuestafuncional', 'id' => $id, 'fun' => $fun]);
            }
        } catch (Exception $e) {
            Log::trace("Error : " . $e);
            throw new Exception("Error : " . $e);
        }
    }

    public function actionMostrarresultadosencuestafuncional() {

        try {

            //Recupero la encuesta Activa
            $session = yii::$app->session;
            $id = $session['encuesta']['idEncuesta'];

            //number_format($total,2,",",".")
            $sql1 = 'pa_enc_mostrar_resultados_encuesta ' . $id;
            $command1 = Yii::$app->dbIntranet->createCommand($sql1);
            $list1 = $command1->queryAll();

            if (count($list1) > 0) {
                $session = yii::$app->session;
                $session['encuesta'] = ['idEncuesta' => $id, 'idfun' => '0', 'descfun' => ''];

                $total = 0;
                for ($i = 0; $i < count($list1); $i++) {
                    $total += $list1[$i]['Totales'];
                }

                $valor = Array('id' => (count($list1) + 1), 'Competencia' => 'Total Competencias', 'Totalfun' => '', 'Cantfun' => '', 'Ponderacion' => '', 'Subtotal' => '', 'Totales' => $total);
                array_push($list1, $valor);

                $model = new ArrayDataProvider(['allModels' => $list1]);
                return $this->render('mostrarresultadosencuesta', [ 'model' => $model]);
            } else {

                Yii::$app->session->setFlash('error', 'Faltan completar Items, por favor completelos');
                return $this->redirect(['completarencuesta', 'fun' => '1']);
            }
        } catch (Exception $e) {
            Log::trace("Error : " . $e);
            throw new Exception("Error : " . $e);
        }
    }

    public function actionActualizardetalle($id, $valor) {
        try {


            $model = Encuestadetalle::find()->where('id = ' . $id)->One();
            $model->seleccion = $valor;
            $model->save();

            \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
            return 'true';
        } catch (Exception $e) {
            Log::trace("Error : " . $e);
            return 'false';
        }
    }

    public function actionGrabarresultados() {
        try {

            //Recupero la encuesta Activa
            $session = yii::$app->session;
            $id = $session['encuesta']['idEncuesta'];

            if (Yii::$app->request->post()) {

                $post = Yii::$app->request->post();

                $sql1 = 'pa_enc_mostrar_resultados_encuesta ' . $id;
                $command1 = Yii::$app->dbIntranet->createCommand($sql1);
                $list1 = $command1->queryAll();

                foreach ($list1 as $fila) {
                    $model = new Encuestavalores();
                    $model->idpublica = $id;
                    $model->idtipocompetencia = $fila['id'];
                    $model->subtotal = ($fila['Subtotal']);
                    $model->ponderacion = $fila['Ponderacion'];
                    $model->total = $fila['Totales'];
                    $model->save();
                }

                $model = Encuestaaspecto::find()
                                ->joinWith(['idtipoaspecto0'])->where('idpublica = ' . $id)->All();

                return $this->render('completaraspecto', ['model' => $model]);
            }
        } catch (Exception $e) {
            Log::trace("Error : " . $e);
            return 'false';
        }
    }

    public function actionCompletaraspectos() {
        try {

            //Recupero la encuesta Activa
            $session = yii::$app->session;
            $id = $session['encuesta']['idEncuesta'];

            if (Yii::$app->request->post()) {
                $post = Yii::$app->request->post();

                for ($i = 0; $i < count($post['id']); $i++) {

                    //echo $post['id'][$i] . ' - ' . $post['tipo'][$i] . ' - ' . $post['text'][$i] . '</br>';

                    $model = Encuestaaspecto::find()->where('id = ' . $post['id'][$i])
                            ->andWhere('idtipoaspecto = ' . $post['tipo'][$i])
                            ->One();
                    
                    $model->texto = $post['text'][$i];
                    $model->validate();
                    
                    if ($model->hasErrors()) {
                        Yii::$app->session->setFlash('error', 'Debe completar los Aspectos');
                        $model = Encuestaaspecto::find()
                                ->joinWith(['idtipoaspecto0'])->where('idpublica = ' . $id)->All();

                        return $this->render('completaraspecto', ['model' => $model]);
                        
                    } else {
                        $model->save();
                    }
                }
            }

            $model = Encuestaobjetivo::find()->where('idpublica = ' . $id)->All();
            return $this->render('completarobjetivo', ['model' => $model]);
        } catch (Exception $e) {
            Log::trace("Error : " . $e);
            throw new Exception("Error : " . $e);
        }
    }

    public function actionCompletarobjetivo() {
        try {

            //Recupero la encuesta Activa
            $session = yii::$app->session;
            $id = $session['encuesta']['idEncuesta'];
            $model = Encuestaobjetivo::find()->where('idpublica = ' . $id)->One();

            if (Yii::$app->request->post()) {
                $post = Yii::$app->request->post();

                $model->nivel = $post['rbnivel'];
                $model->texto = $post['objetivo'];
                $model->recomendacion = $post['rbreco'];
                
                $model->validate();
                if ($model->hasErrors()) {
                    Yii::$app->session->setFlash('error', 'Debe completar el Objetivo.');
                    $model = Encuestaobjetivo::find()->where('idpublica = ' . $id)->All();
                    return $this->render('completarobjetivo', ['model' => $model]);
                        
                } else {
                    $model->save();
                    return $this->render('completargracias', ['id' => $id]);
                }
            }

            return $this->render('completarobjetivo', ['model' => $model]);
        } catch (Exception $e) {
            Log::trace("Error : " . $e);
            throw new Exception("Error : " . $e);
        }
    }

    public function actionFinalizarencuesta() {
        try {

            //Recupero la encuesta Activa
            $session = yii::$app->session;
            $id = $session['encuesta']['idEncuesta'];

            $model = EncuestaPublica::find()->where('id = ' . $id)->One();
            if ($model != null) {
                $model->fecha = date('Ymd');
                $model->save();
            }

            return $this->goHome();
        } catch (Exception $e) {
            Log::trace("Error : " . $e);
            throw new Exception("Error : " . $e);
        }
    }

}
