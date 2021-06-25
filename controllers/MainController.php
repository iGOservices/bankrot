<?php

namespace app\controllers;

use Yii;
use app\models\ClientMainInfo;
use app\models\ClientMainInfoSearch;
use app\models\UploadForm;
use app\models\Upload;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MainController implements the CRUD actions for ClientMainInfo model.
 */
class MainController extends Controller
{


    public $layout = '/user';

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
     * Lists all ClientMainInfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new ClientMainInfo();
        $uploadForm = new UploadForm();

        $model->user_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                //echo"<pre>";print_r(Yii::$app->request->post());die();
                $uploadForm->save('passport',$model->id);
                $uploadForm->save('inn',$model->id);
                $uploadForm->save('snils',$model->id);
                echo"success";
                //return $this->redirect('index');
            }else{
                print_r($model->errors);
            }    
        }else{
           
        }

        return $this->render('index', [
            'model' => $model,
            'uploadForm' => $uploadForm,
        ]);
    }


    public function actionShowImg()
    {
        $model = ClientMainInfo::findOne(27);

        $result = Upload::find()->where(['model_id' => 27])->all();

        return $this->render('show-img', [
            'model' => $model,
            'result' => $result,
        ]);
    }

    public function actionDeleteImg($id, $model_id)
    {
        $model = Upload::findOne($id);
        $model->deleteFile();
        return $this->redirect(array('show-img'));
    }

}
