<?php

namespace app\controllers;

use Yii;
use app\models\ClientTicket;
use app\models\ClientTicketSearch;
use app\models\UploadForm;
use app\models\Upload;
use app\models\Passport;
use app\models\InterPassport;
use app\models\Creditor;

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
        $model = new ClientTicket();
        $uploadForm = new UploadForm();
        $passport_model = new Passport();
        $inter_passport_model = new InterPassport();

        $model->user_id = Yii::$app->user->id;
        $model->facsimile = 1;


  
       


        if (($model->load(Yii::$app->request->post())) && ($passport_model->load(Yii::$app->request->post())) && ($inter_passport_model->load(Yii::$app->request->post()))) { 
            //регуляркой убираем лишние символы из полей ввода
            $model->phone = preg_replace('~\D+~','', $model->phone);    
            $model->snils = preg_replace('/[^0-9]/', '', $model->snils);    
            $passport_model->code = preg_replace('/[^0-9]/', '', $passport_model->code);

            
            if($model->validate() && $passport_model->validate() && $inter_passport_model->validate()){
          
                //сначала нужно сохранить основную модельку чтоб получить id  тикета
                if($model->save()){
                    $passport_model->ticket_id = $model->id;
                    $inter_passport_model->ticket_id = $model->id;


                    $creditor_post = Yii::$app->request->post('Creditor');
                    $count = $creditor_post ? count($creditor_post) : 0;
                    $count++;
                    for ($i = 1; $i < $count; $i++) {
                        $creditor = new Creditor();
                        $creditor->load($creditor_post[$i]);
                        $creditor->ticket_id = $model->id;
                        $creditor->save();
                    }

                                     
                    if($passport_model->save() && $inter_passport_model->save()){
                        //сохраняем файлы 
                        $uploadForm->save('passport',$model->id);
                        $uploadForm->save('inter_passport',$model->id);
                        $uploadForm->save('inn',$model->id);
                        $uploadForm->save('snils',$model->id);
                        $uploadForm->save('changed_fio',$model->id);
                        $uploadForm->save('is_ip',$model->id);
                        $uploadForm->save('facsimile',$model->id);
                        echo"success";
                    }
                }
            }else{
                print_r($passport_model->getErrors());
                print_r($model->getErrors());
                print_r($inter_passport_model->getErrors());
            }
        
            
            /*if($model->save()){
                //echo"<pre>";print_r(Yii::$app->request->post());die();
                $uploadForm->save('passport',$model->id);
                $uploadForm->save('inn',$model->id);
                $uploadForm->save('snils',$model->id);
                echo"success";
                //return $this->redirect('index');*/  
        }else{
           // print_r($model->errors);
           // print_r($passport_model->errors);
           // print_r($inter_passport_model->errors);
           //echo"errors;"; die();
        }

        return $this->render('index', [
            'model' => $model,
            'passport_model' => $passport_model,
            'inter_passport_model' => $inter_passport_model,
            'uploadForm' => $uploadForm,
        ]);
    }


   /* public function actionShowImg()
    {
        $model = ClientMainInfo::findOne(27);

        $result = Upload::find()->where(['model_id' => 27])->all();

        return $this->render('show-img', [
            'model' => $model,
            'result' => $result,
        ]);
    }*/

    public function actionDeleteImg($id, $model_id)
    {
        $model = Upload::findOne($id);
        $model->deleteFile();
        return $this->redirect(array('show-img'));
    }

}
