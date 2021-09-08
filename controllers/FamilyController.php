<?php

namespace app\controllers;

use app\models\Brak;
use app\models\ClientTicket;
use app\models\Directory;
use app\models\Razvod;
use app\models\UploadForm;
use Yii;
use app\models\Family;
use app\models\FamilySearch;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * FamilyController implements the CRUD actions for Family model.
 */
class FamilyController extends Controller
{
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
     * Lists all Family models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FamilySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Family model.
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
     * Creates a new Family model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Family();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Family model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Family model.
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
     * Finds the Family model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Family the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Family::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Добавляем нового Доходы и Налоги
     * @return string
     */
    public function actionAddNewSp(){
        {
            $i = Yii::$app->request->post('num');
            $form = ActiveForm::begin([
                'fieldConfig' => [
                    'options' => [
                        'class' => 'form-group row'
                    ]]]);
            $brak = new Brak();
            $razvod = new Razvod();
            $uploadForm = new UploadForm();

            return $this->renderAjax('_new_sp', ['form' => $form, 'brak' => $brak,'razvod' => $razvod, 'uploadForm' => $uploadForm,'increment' => $i]);
        }

    }

    /**
     * Добавляем нового Доходы и Налоги
     * @return string
     */
    public function actionAddNewFamily(){
        {
            $directory = Directory::findOne(1);
            $i = Yii::$app->request->post('num');
            $form = ActiveForm::begin([
                'id' => 'family',
                'action' => '/family/save-model',
                'options' => ['enctype' => 'multipart/form-data'],
                'fieldConfig' => [
                    'options' => [
                        'class' => 'form-group row'
                    ]]]);
            $family = new Family();
            $uploadForm = new UploadForm();

            return $this->renderAjax('_new_family', ['form' => $form, 'family' => $family,'uploadForm' => $uploadForm,'increment' => $i,'directory' => $directory]);
        }

    }

    public function actionSaveModel(){
        $ticket_id = ClientTicket::getActiveTicket();
        $data = Family::saveFamily($ticket_id);
        $result =  [
            'success' => $data,
        ];
        return json_encode($result);
    }

    public function actionSaveModelSp(){
        $ticket_id = ClientTicket::getActiveTicket();
        $data = Family::saveSp($ticket_id);
        $result =  [
            'success' => $data,
        ];
        return json_encode($result);
    }
}
