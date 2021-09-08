<?php

namespace app\controllers;

use app\models\Passport;
use app\models\Upload;
use app\models\UploadForm;
use Yii;
use app\models\ClientTicket;
use app\models\ClientTicketSearch;
use yii\base\BaseObject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientTicketController implements the CRUD actions for ClientTicket model.
 */
class ClientTicketController extends Controller
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
     * Lists all ClientTicket models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new ClientTicketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClientTicket model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $upload = Upload::find()->where(['model_id' => $id])->all();
        //echo"<pre>";print_r($upload);die();
        $passport = Passport::find()->where(['ticket_id' => $id])->one();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'passport' => $passport,
            'upload' => $upload,
        ]);
    }

    /**
     * Creates a new ClientTicket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClientTicket();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ClientTicket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$ticket_status_id = null)
    {
        $model = $this->findModel($id);
        $uploadForm = new UploadForm();

        if ($model->load(Yii::$app->request->post())) {
            $model->phone = preg_replace('~\D+~', '', $model->phone);
            $model->snils = preg_replace('/[^0-9]/', '', $model->snils);
            if($model->save()){
                $uploadForm->save("main_info",'inn',$model->id);
                $uploadForm->save("main_info",'snils',$model->id);
                $uploadForm->save("main_info",'changed_fio',$model->id);
                $uploadForm->save("main_info",'is_ip',$model->id);
                $uploadForm->save("main_info",'facsimile',$model->id);
                $uploadForm->save("main_info",'trud_book',$model->id);
                $uploadForm->save("main_info",'is_work',$model->id);
                if($ticket_status_id){
                    return $this->redirect(['ticket-status/view', 'id' => $ticket_status_id]);
                }else{
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'uploadForm' => $uploadForm,
            'model' => $model,
            'ticket_status_id' => $ticket_status_id,
        ]);
    }

    /**
     * Deletes an existing ClientTicket model.
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
     * Finds the ClientTicket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClientTicket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClientTicket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
