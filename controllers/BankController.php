<?php

namespace app\controllers;

use app\models\ClientTicket;
use app\models\Directory;
use app\models\TicketStatus;
use app\models\UploadForm;
use Yii;
use app\models\Bank;
use app\models\BankSearch;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * BankController implements the CRUD actions for Bank model.
 */
class BankController extends Controller
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
     * Lists all Bank models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BankSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bank model.
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
     * Creates a new Bank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bank();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bank model.
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
            $uploadForm->save("bank","bank",$model->id,$model->ticket_id);
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
     * Deletes an existing Bank model.
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
     * Finds the Bank model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bank the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bank::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Добавляем информацию о счетах в банках и иных кредитных организациях к тикету
     * @return string
     */
    public function actionAddNewBank(){
        {
            $type = TicketStatus::getCureType();
            $directory = Directory::find()->where(['type' => $type])->asArray()->all();
            $i = Yii::$app->request->post('num');
            $form = ActiveForm::begin([
                'enableClientValidation' => true,
                'fieldConfig' => [
                    'options' => [
                        'class' => 'form-group row'
                    ]]]);
            $bank = new Bank();
            $uploadForm = new UploadForm();

            return $this->renderAjax('_new_bank', ['form' => $form, 'bank' => $bank, 'uploadForm' => $uploadForm,'increment' => $i,'directory' => $directory]);
        }

    }

    public function actionSaveModel(){
        $ticket_id = ClientTicket::getActiveTicket();
        $data = Bank::saveBank($ticket_id);
        $result =  [
            'success' => $data,
        ];
        return json_encode($result);
    }

}
