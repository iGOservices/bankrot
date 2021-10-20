<?php

namespace app\controllers;

use app\models\ClientTicket;
use app\models\Directory;
use app\models\TicketStatus;
use app\models\UploadForm;
use Yii;
use app\models\OtherShares;
use app\models\OtherSharesSearch;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * OtherSharesController implements the CRUD actions for OtherShares model.
 */
class OtherSharesController extends Controller
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
     * Lists all OtherShares models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OtherSharesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OtherShares model.
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
     * Creates a new OtherShares model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OtherShares();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OtherShares model.
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
            $uploadForm->save("other_shares","other_shares",$model->id,$model->ticket_id);
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
     * Deletes an existing OtherShares model.
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
     * Finds the OtherShares model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OtherShares the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OtherShares::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Добавляем нового Иные ценные бумаги к тикету
     * @return string
     */
    public function actionAddNewOtherShares(){
        {
            $type = TicketStatus::getCureType();
            $directory = Directory::find()->where(['type' => $type])->asArray()->all();
            $i = Yii::$app->request->post('num');
               $form = ActiveForm::begin([
                                'id' => 'other_shares',
                                'action' => '/other-shares/save-model',
                                'enableClientValidation' => true,
                                'enableAjaxValidation' => true,
                                'options' => ['enctype' => 'multipart/form-data'],
                                'fieldConfig' => [
                                    'options' => [
                                        'class' => 'form-group row'
                                    ]]]);
                $shares = new OtherShares();
                $uploadForm = new UploadForm();

            return $this->renderAjax('_new_other_shares', ['form' => $form, 'other_shares' => $shares, 'uploadForm' => $uploadForm,'increment' => $i,'directory' => $directory]);
        }

    }

    public function actionSaveModel(){
        $ticket_id = ClientTicket::getActiveTicket();
        $data = OtherShares::saveOtherShares($ticket_id);
        $result =  [
            'success' => $data,
        ];
        return json_encode($result);
    }
}
