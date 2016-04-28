<?php

namespace app\controllers;

use Yii;
use app\models\Memo;
use app\models\MemoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;
use app\models\Pdfmemosupload;
use yii\web\UploadedFile;
use app\models\Memosector;


use app\models\Gerencias;
use app\models\Sectores;
use app\models\Areas;

/**
 * MemoController implements the CRUD actions for Memo model.
 */
class MemoController extends Controller
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
     * Lists all Memo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Memo model.
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
     * Creates a new Memo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Memo();
        $imageModel = new Pdfmemosupload();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){

            $model->save();
            
            $imageModel->image = UploadedFile::getInstance($imageModel,'image');

            $imageModel->image->saveAs('memos/' . $model->id .  '.' . $imageModel->image->extension);

            return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('create', [
                    'model'         =>  $model,
                    'imageModel'    =>  $imageModel,
                ]);
            }
        } else {
            return $this->render('create', [
                'model'         =>  $model,
                'imageModel'    =>  $imageModel,
            ]);
        }
    }

    /**
     * Updates an existing Memo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $imageModel = new Pdfmemosupload();

        if ($model->load(Yii::$app->request->post())) {

            if($model->validate()){
                $model->save();
                $imageModel->image = UploadedFile::getInstance($imageModel,'image');

                $imageModel->image->saveAs('memos/' . $model->id .  '.' . $imageModel->image->extension);

                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('update', [
                    'model'         =>  $model,
                    'imageModel'    =>  $imageModel,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'imageModel'    =>  $imageModel,
            ]);
        }
    }

    /**
     * Deletes an existing Memo model.
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
     * Finds the Memo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Memo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Memo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGerencias($id){
        
        echo json_encode(ArrayHelper::map(Gerencias::find()->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionSectores($id){
        
        echo json_encode(ArrayHelper::map(Sectores::find()->Where(['idgerencia'=>$id])->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionAreas($id){
        
        echo json_encode(ArrayHelper::map(Areas::find()->Where(['sector'=>$id])->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionUltimasnovedades()
    {

       $sql = 'pa_memo_listarnovedades ' . Yii::$app->user->identity->sector;
       $resultado = Yii::$app->get('dbIntranet')->createCommand($sql)->queryAll();

       $dataProvider = new ArrayDataProvider([
                'allModels' => $resultado,
                'sort' => [
                    'attributes' => ['fechainicio'=> SORT_DESC],
                ],
                'pagination' => [
                    'pageSize' => 20,
                ],
        ]);
        return $this->render('ultimasnovedades', [
            'dataProvider' => $dataProvider,
        ]);     





        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionVerdetalle()
    {

        $id     = Yii::$app->request->get('id');
        $model  = $this->findModel($id);

//        $gerencia   =$model->gerencia->gerencia_nombre;
//        $sector     =$model->getSector0();
        
        return $this->render('verdetalle', [
            'model'     =>  $model,
 //           'gerencia'  =>  $gerencia,
 //           'sector'    =>  $sector
        ]);

/*
       $sql = 'pa_memo_listarnovedades ' . Yii::$app->user->identity->sector;
       $resultado = Yii::$app->get('dbIntranet')->createCommand($sql)->queryAll();

       $dataProvider = new ArrayDataProvider([
                'allModels' => $resultado,
                'sort' => [
                    'attributes' => ['fechainicio'=> SORT_DESC],
                ],
                'pagination' => [
                    'pageSize' => 20,
                ],
        ]);
        return $this->render('ultimasnovedades', [
            'dataProvider' => $dataProvider,
        ]);     





        $this->findModel($id)->delete();

        return $this->redirect(['index']);
*/
    }

    public function actionMostrarsectores()
    {

        if (Yii::$app->request->post())
        {
            $memo = Yii::$app->request->post('idMemo');
            
            $models =  Memosector::find()->where(['memo' => $memo])->All();
            foreach ($models AS $model)
            {
                $model->delete();            
            }
            $sectores = Yii::$app->request->post('selection');
            foreach ($sectores AS $sector)
            {
                $model = new Memosector();
                $model->memo   = $memo; 
                $model->sector = $sector;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $memo]);
                   //print_r(Yii::$app->request->post());exit;
        }
       $memo = Yii::$app->request->get('id');        
       $resultado = Yii::$app->get('dbIntranet')->createCommand('pa_memo_mostrarsectores @id =' . $memo )->queryAll();
/*
 $gerencia='';
        foreach ($resultado AS $sector){
            if ($gerencia != $sector['Gerencia'])
            {
                $gerencia = $sector['Gerencia'];
            }
            $arrGerencia[$sector['Gerencia']]['Nombre']=$sector['Nombre'];
            $arrGerencia[$sector['Gerencia']]['Sectores'][$sector['Sector']]['Nombre']=$sector['NombreSector'];
            $arrGerencia[$sector['Gerencia']]['Sectores'][$sector['Sector']]['selection']=$sector['seleccion'];
        } 
       */
       $dataProvider = new ArrayDataProvider([
                'allModels' => $resultado,
                'pagination' => [
                    'pageSize' => 20,
                ],

        ]);

        return $this->render('mostrarsectores', [
            'dataProvider' => $dataProvider,
        ]);     
    }

}
