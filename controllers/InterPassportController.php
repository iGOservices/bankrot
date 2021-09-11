<?php

namespace app\controllers;

use app\models\UploadForm;
use Yii;
use app\models\InterPassport;
use app\models\InterPassportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InterPassportController implements the CRUD actions for InterPassport model.
 */
class InterPassportController extends Controller
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
     * Lists all InterPassport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InterPassportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InterPassport model.
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
     * Creates a new InterPassport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InterPassport();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InterPassport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$ticket_status_id = null)
    {
        $model = $this->findModel($id);
        $uploadForm = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $uploadForm->save("main_info",'inter_passport',$model->id,$model->ticket_id);
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
     * Deletes an existing InterPassport model.
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
     * Finds the InterPassport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InterPassport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InterPassport::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
