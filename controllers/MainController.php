<?php

namespace app\controllers;

use app\models\Bank;
use app\models\Deal;
use app\models\Debitor;
use app\models\Directory;
use app\models\EnforceProc;
use app\models\Family;
use app\models\Nalog;
use app\models\OtherShares;
use app\models\Property;
use app\models\Shares;
use app\models\ValuableProperty;
use Yii;
use app\models\ClientTicket;
use app\models\ClientTicketSearch;
use app\models\UploadForm;
use app\models\Upload;
use app\models\Passport;
use app\models\InterPassport;
use app\models\Creditor;

use yii\base\BaseObject;
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

        $directory = Directory::findOne(1);



        $model->user_id = Yii::$app->user->id;
        $model->facsimile = 1;

        $passport_model->ticket_id = -1;
        $inter_passport_model->ticket_id = -1;

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

                    if(!Family::saveFamily($model->id)){
                        echo "Сохранение семьи не удалось";die();
                    }

                    if(!Family::saveSp($model->id)) {
                        echo "Сохранение sp не удалось";
                        die();
                    }

                    if(!Creditor::saveCreditor($model->id)) {
                        echo "Сохранение кредитора не удалось";
                        die();
                    }

                    if(!Debitor::saveDebitor($model->id)) {
                        echo "Сохранение дебитора не удалось";
                        die();
                    }

                    if(!Property::saveProperty($model->id)) {
                        echo "Сохранение имущества не удалось";
                        die();
                    }

                    if(!Bank::saveBank($model->id)) {
                        echo "Сохранение банка не удалось";
                        die();
                    }

                    if(!Shares::saveShares($model->id)) {
                        echo "Сохранение Акций не удалось";
                        die();
                    }

                    if(!OtherShares::saveOtherShares($model->id)) {
                        echo "Сохранение иных ценных бумаг не удалось";
                        die();
                    }
                    if(!ValuableProperty::saveValuableProperty($model->id)) {
                        echo "Сохранение наличных денежных средств не удалось";
                        die();
                    }

                    if(!Deal::saveDeal($model->id)) {
                        echo "Сохранение сделок не удалось";
                        die();
                    }
                    if(!Nalog::saveNalog($model->id)) {
                        echo "Сохранение налогов не удалось";
                        die();
                    }

                    if(!EnforceProc::saveEnforceProc($model->id)) {
                        echo "Сохранение исполнительных производств не удалось";
                        die();
                    }

                    if($passport_model->save() && $inter_passport_model->save()){
                        //сохраняем файлы
                        $uploadForm->save("main_info",'passport',$model->id);
                        $uploadForm->save("main_info",'inter_passport',$model->id);
                        $uploadForm->save("main_info",'inn',$model->id);
                        $uploadForm->save("main_info",'snils',$model->id);
                        $uploadForm->save("main_info",'changed_fio',$model->id);
                        $uploadForm->save("main_info",'is_ip',$model->id);
                        $uploadForm->save("main_info",'facsimile',$model->id);
                        $uploadForm->save("main_info",'trud_book',$model->id);
                        $uploadForm->save("main_info",'is_work',$model->id);
                    }
                }
            }else{
//                print_r($passport_model->getErrors());
//                print_r($model->getErrors());
//                print_r($inter_passport_model->getErrors());
//                die();
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
            'directory' => $directory,
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
