<?php

namespace app\controllers;

use app\models\ClientTicket;
use app\models\UploadForm;
use Yii;
use app\models\Proxy;
use app\models\ProxySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProxyController implements the CRUD actions for Proxy model.
 */
class ProxyController extends Controller
{
    public $layout = '/admin';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Proxy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProxySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Proxy model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Proxy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Proxy();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Proxy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $ticket_status_id = null)
    {
        $model = $this->findModel($id);
        $uploadForm = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $uploadForm->save("proxy","proxy",$model->id,$model->ticket_id);
            $uploadForm->save("proxy","proxy_publ",$model->id,$model->ticket_id);
            $uploadForm->save("proxy","proxy_dep",$model->id,$model->ticket_id);
            if($ticket_status_id){
                return $this->redirect(['ticket-status/view', 'id' => $ticket_status_id]);
            }else{
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'uploadForm' => $uploadForm,
            'model' => $model,
            'ticket_status_id' => $ticket_status_id,
        ]);
    }

    /**
     * Deletes an existing Proxy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Proxy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Proxy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proxy::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionSaveModel(){
        $ticket_id = ClientTicket::getActiveTicket();
        $data = Proxy::saveProxy($ticket_id);
        $result =  [
            'success' => $data,
        ];
        return json_encode($result);
    }
}
