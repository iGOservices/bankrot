<?php

namespace app\controllers;

use app\models\ClientTicket;
use app\models\Directory;
use app\models\UploadForm;
use Yii;
use app\models\ValuableProperty;
use app\models\ValuablePropertySearch;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * ValuablePropertyController implements the CRUD actions for ValuableProperty model.
 */
class ValuablePropertyController extends Controller
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
     * Lists all ValuableProperty models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ValuablePropertySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ValuableProperty model.
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
     * Creates a new ValuableProperty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ValuableProperty();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ValuableProperty model.
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
            $uploadForm->save("valuable_property","valuable_property",$model->id,$model->ticket_id);
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
     * Deletes an existing ValuableProperty model.
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
     * Finds the ValuableProperty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ValuableProperty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ValuableProperty::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Добавляем нового имущество к тикету
     * @return string
     */
    public function actionAddNewValuableProperty(){
        {
            $directory = Directory::findOne(1);
            $i = Yii::$app->request->post('num');
            $form = ActiveForm::begin([
                'id' => 'valuable_property',
                'action' => '/valuable-property/save-model',
                'enableClientValidation' => true,
                'enableAjaxValidation' => true,
                'options' => ['enctype' => 'multipart/form-data'],
                'fieldConfig' => [
                    'options' => [
                        'class' => 'form-group row'
                    ]]]);
            $property = new ValuableProperty();
            $uploadForm = new UploadForm();

            return $this->renderAjax('_new_valuable_property', ['form' => $form, 'valuable_property' => $property, 'uploadForm' => $uploadForm,'increment' => $i,'directory' => $directory]);
        }
    }

    public function actionSaveModel(){
        $ticket_id = ClientTicket::getActiveTicket();
        $data = ValuableProperty::saveValuableProperty($ticket_id);
        $result =  [
            'success' => $data,
        ];
        return json_encode($result);
    }
}
