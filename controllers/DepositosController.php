<?php

namespace app\controllers;

use Yii;
use app\models\Depositos;
use app\models\DepositosSearch;
use app\models\Empresas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;

/**
 * DepositosController implements the CRUD actions for Depositos model.
 */
class DepositosController extends Controller
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
     * Lists all Depositos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepositosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Depositos model.
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
     * Creates a new Depositos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Depositos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Depositos model.
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
     * Deletes an existing Depositos model.
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
     * Finds the Depositos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Depositos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Depositos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionEmpresas($id)
    {    
        echo json_encode(ArrayHelper::map(Empresas::find()->all(), 'id', 'nombre'));
        //echo json_decode($DPartList->models);
    }

    public function actionConsultadepositos()
    {
        $searchModel = new DepositosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('consultadepositos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDepositosporempresas()
    {    
        $id = Yii::$app->request->get('id');
        $array=ArrayHelper::map(Depositos::find()->where(['empresa' => $id])->All(), 'id', 'nombre');

        foreach ($array AS &$item)
        {
            $item=utf8_encode($item);
        }
        echo json_encode($array);
        //echo json_decode($DPartList->models);
    }

    public function actionRotulos()
    {

        if (Yii::$app->request->post()) {            
            $depo = Yii::$app->request->post('deposito_d');
            $depoO = Yii::$app->request->post('deposito_o');
            $id = $depo;
            $ido = $depoO;
            /*
            return $this->render('improtulo', [
                'model' => $this->findModel($id),
            ]);
            */
            // get your HTML raw content without any layouts or scripts
            $content = $this->renderPartial('improtulo', [
                'model' => $this->findModel($id),
                'modelo' => $this->findModel($ido),
            ]);
         
            // setup kartik\mpdf\Pdf component
            $pdf = new Pdf([
                // set to use core fonts only
                'mode' => Pdf::MODE_UTF8, 
                // A4 paper format
                'format' => Pdf::FORMAT_A4, 
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT, 
                // stream to browser inline
                'destination' => Pdf::DEST_BROWSER, 
                // your html content input
                'content' => $content,  
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting 
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '.kv-heading-1{font-size:72px}
                .kv-heading-2{font-size:48px}
                .kv-heading-3{font-size:36px}', 
                 // set mPDF properties on the fly
                'options' => ['title' => 'Rotulos'],
                 // call mPDF methods on the fly
                'methods' => [ 
                    //'SetHeader'=>[''], 
                    //'SetFooter'=>['{PAGENO}'],
                ]
            ]);
         
            // return the pdf output as per the destination setting
            return $pdf->render(); 
        } else {
            $model = new Depositos();
            $modelo = new Depositos();

            return $this->render('rotulos', [
                'model' => $model,
                'modelo' => $modelo,
            ]);
        }
    }

    public function actionImprotulo() {

        print_r(Yii::$app->request->post());exit;

        $deposito = Yii::$app->request->post('');

        return $this->render('improtulo', [
            'model' => $this->findModel($id),
        ]);

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_reportView');
     
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Krajee Report Header'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
     
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }    

}
