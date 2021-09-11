<?php

namespace app\controllers;

use app\models\ClientTicket;
use app\models\Directory;
use app\models\UploadForm;
use Yii;
use app\models\Nalog;
use app\models\NalogSearch;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * NalogController implements the CRUD actions for Nalog model.
 */
class NalogController extends Controller
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
     * Lists all Nalog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nalog model.
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
     * Creates a new Nalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Nalog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Nalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $ticket_status_id = null)
    {
        $uploadForm = new UploadForm();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $uploadForm->save("nalog","ndfl",$model->id,$model->ticket_id);
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
     * Deletes an existing Nalog model.
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
     * Finds the Nalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nalog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Добавляем нового Доходы и Налоги
     * @return string
     */
    public function actionAddNewNalog(){
        {
            $directory = Directory::findOne(1);
            $i = Yii::$app->request->post('num');
            $form = ActiveForm::begin([
                'id' => 'nalog',
                'action' => '/nalog/save-model',
                'enableClientValidation' => true,
                'enableAjaxValidation' => true,
                'options' => ['enctype' => 'multipart/form-data'],
                'fieldConfig' => [
                    'options' => [
                        'class' => 'form-group row'
                    ]]]);
            $nalog = new Nalog();
            $uploadForm = new UploadForm();

            return $this->renderAjax('_new_nalog', ['form' => $form, 'nalog' => $nalog, 'uploadForm' => $uploadForm,'increment' => $i,'directory' => $directory]);
        }

    }

    public function actionSaveModel(){
        $ticket_id = ClientTicket::getActiveTicket();
        $data = Nalog::saveNalog($ticket_id);
        $result =  [
            'success' => $data,
        ];
        return json_encode($result);
    }

}
