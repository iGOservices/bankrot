<?php

namespace app\controllers;

use app\models\Bank;
use app\models\Brak;
use app\models\Deal;
use app\models\Debitor;
use app\models\Directory;
use app\models\EnforceProc;
use app\models\Family;
use app\models\Nalog;
use app\models\Other;
use app\models\OtherShares;
use app\models\Pdf;
use app\models\Property;
use app\models\Proxy;
use app\models\Razvod;
use app\models\Shares;
use app\models\TicketStatus;
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
use yii\helpers\Url;
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

    public function actionSaveModel(){
            $data = Yii::$app->request->post();

            $model = new ClientTicket();
            $uploadForm = new UploadForm();
            $passport_model = new Passport();
            $inter_passport_model = new InterPassport();

            $model->user_id = Yii::$app->user->id;

            $ticket_id = ClientTicket::getActiveTicket();

            if($ticket_id){
                $model = ClientTicket::findOne($ticket_id);
                $passport_model = Passport::find()->where(['ticket_id' => $ticket_id])->one();
                $inter_passport_model = InterPassport::find()->where(['ticket_id' => $ticket_id])->one();
                //print_r($ticket_id);die();
            }

            if ($model->load(Yii::$app->request->post()) && $passport_model->load(Yii::$app->request->post()) && $inter_passport_model->load(Yii::$app->request->post())) {
                //регуляркой убираем лишние символы из полей ввода
                $model->phone = preg_replace('~\D+~', '', $model->phone);
                $model->snils = preg_replace('/[^0-9]/', '', $model->snils);
                $passport_model->code = preg_replace('/[^0-9]/', '', $passport_model->code);
                if ($model->validate() && $passport_model->validate() && $inter_passport_model->validate()) {
                    if($model->save()){

                        $ticket_id = ClientTicket::getActiveTicket();
                        if(!$ticket_id){
                            $ticket_status = new TicketStatus();
                            $ticket_status->ticket_id = $model->id;
                            $ticket_status->status = 0;
                            $ticket_status->save();
                        }
                        $passport_model->ticket_id = $model->id;
                        $inter_passport_model->ticket_id = $model->id;
                        if($passport_model->save() && $inter_passport_model->save()) {
                            $uploadForm->save("main_info",'passport',$passport_model->id,$model->id);
                            $uploadForm->save("main_info",'inter_passport',$inter_passport_model->id,$model->id);
                            $uploadForm->save("main_info",'inn',$model->id,$model->id);
                            $uploadForm->save("main_info",'snils',$model->id,$model->id);
                            $uploadForm->save("main_info",'changed_fio',$model->id,$model->id);
                            $uploadForm->save("main_info",'is_ip',$model->id,$model->id);
                            $uploadForm->save("main_info",'facsimile',$model->id,$model->id);
                            $uploadForm->save("main_info",'trud_book',$model->id,$model->id);
                            $uploadForm->save("main_info",'is_work',$model->id,$model->id);

                            $result = [
                                'success' => true,
                                'message' => 'Save'
                            ];
                        }else {
                            $result = [
                                'success' => false,
                                'message' => $passport_model->errors . " " .  $inter_passport_model->errors,
                            ];
                        }
                    }else{
                        $result = [
                            'success' => false,
                            'message' => $model->errors
                        ];
                    }
                } else {
                    $result = [
                        'success' => false,
                        'message' => 'Fail validation'
                    ];
                }
            }else{
                $result = [
                    'success' => false,
                    'message' => 'Fail load post'
                ];
            }

            return json_encode($result);

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
        $proxy = new Proxy();

        $ticket_id = ClientTicket::getActiveTicket();

        if($ticket_id){
            $model = ClientTicket::findOne($ticket_id);
            $passport_model = Passport::find()->where(['ticket_id' => $ticket_id])->one();
            $inter_passport_model = InterPassport::find()->where(['ticket_id' => $ticket_id])->one();
            $family = Family::find()->where(['ticket_id' => $ticket_id])->all();
            $brak =Brak::find()->where(['ticket_id' => $ticket_id])->all();
            $razvod = Razvod::find()->where(['ticket_id' => $ticket_id])->all();
            $creditor = Creditor::find()->where(['ticket_id' => $ticket_id])->all();
            $debitor = Debitor::find()->where(['ticket_id' => $ticket_id])->all();
            $property = Property::find()->where(['ticket_id' => $ticket_id])->all();
            $bank = Bank::find()->where(['ticket_id' => $ticket_id])->all();
            $shares = Shares::find()->where(['ticket_id' => $ticket_id])->all();
            $other_shares = OtherShares::find()->where(['ticket_id' => $ticket_id])->all();
            $valuable_property = ValuableProperty::find()->where(['ticket_id' => $ticket_id])->all();
            $deal = Deal::find()->where(['ticket_id' => $ticket_id])->all();
            $nalog = Nalog::find()->where(['ticket_id' => $ticket_id])->all();
            $enforce_proc = EnforceProc::find()->where(['ticket_id' => $ticket_id])->all();
            $other = Other::find()->where(['ticket_id' => $ticket_id])->all();

            $brak = Brak::find()->where(['ticket_id' => $ticket_id])->all();
            $razvod = Razvod::find()->where(['ticket_id' => $ticket_id])->all();

            $proxy = Proxy::find()->where(['ticket_id' => $ticket_id])->one();
            //print_r($ticket_id);die();
        }

        if(!$proxy){

            $proxy = new Proxy();
        }

        $directory = Directory::findOne(1);

        $model->user_id = Yii::$app->user->id;
        $model->facsimile = 1;
        $passport_model->ticket_id = -1;
        $inter_passport_model->ticket_id = -1;

//        if ($model->load(Yii::$app->request->post())){
//            if($model->validate())
//                print_r($model);
//            else
//                echo "asd";
//
//        }

//        if (($model->load(Yii::$app->request->post())) && ($passport_model->load(Yii::$app->request->post())) && ($inter_passport_model->load(Yii::$app->request->post()))) {
//            //регуляркой убираем лишние символы из полей ввода
//            $model->phone = preg_replace('~\D+~','', $model->phone);
//            $model->snils = preg_replace('/[^0-9]/', '', $model->snils);
//            $passport_model->code = preg_replace('/[^0-9]/', '', $passport_model->code);
//
//
//            if($model->validate() && $passport_model->validate() && $inter_passport_model->validate()){
//
//                //сначала нужно сохранить основную модельку чтоб получить id  тикета
//                if($model->save()){
//                    $passport_model->ticket_id = $model->id;
//                    $inter_passport_model->ticket_id = $model->id;
//
//                    if(!Family::saveFamily($model->id)){
//                        echo "Сохранение семьи не удалось";//die();
//                    }
//
//                    if(!Family::saveSp($model->id)) {
//                        echo "Сохранение sp не удалось";
//                       // die();
//                    }
//
//                    if(!Creditor::saveCreditor($model->id)) {
//                        echo "Сохранение кредитора не удалось";
//                        //die();
//                    }
//
//                    if(!Debitor::saveDebitor($model->id)) {
//                        echo "Сохранение дебитора не удалось";
//                        //die();
//                    }
//
//                    if(!Property::saveProperty($model->id)) {
//                        echo "Сохранение имущества не удалось";
//                        //die();
//                    }
//
//                    if(!Bank::saveBank($model->id)) {
//                        echo "Сохранение банка не удалось";
//                        //die();
//                    }
//
//                    if(!Shares::saveShares($model->id)) {
//                        echo "Сохранение Акций не удалось";
//                        //die();
//                    }
//
//                    if(!OtherShares::saveOtherShares($model->id)) {
//                        echo "Сохранение иных ценных бумаг не удалось";
//                        //die();
//                    }
//                    if(!ValuableProperty::saveValuableProperty($model->id)) {
//                        echo "Сохранение наличных денежных средств не удалось";
//                        //die();
//                    }
//
//                    if(!Deal::saveDeal($model->id)) {
//                        echo "Сохранение сделок не удалось";
//                        //die();
//                    }
//                    if(!Nalog::saveNalog($model->id)) {
//                        echo "Сохранение налогов не удалось";
//                        //die();
//                    }
//
//                    if(!EnforceProc::saveEnforceProc($model->id)) {
//                        echo "Сохранение исполнительных производств не удалось";
//                        //die();
//                    }
//
//                    if(!Other::saveOther($model->id)) {
//                        echo "Сохранение дополнительных документов не удалось";
//                        //die();
//                    }
//
//                    if($passport_model->save() && $inter_passport_model->save()){
//                        //сохраняем файлы
//                        $uploadForm->save("main_info",'passport',$model->id);
//                        $uploadForm->save("main_info",'inter_passport',$model->id);
//                        $uploadForm->save("main_info",'inn',$model->id);
//                        $uploadForm->save("main_info",'snils',$model->id);
//                        $uploadForm->save("main_info",'changed_fio',$model->id);
//                        $uploadForm->save("main_info",'is_ip',$model->id);
//                        $uploadForm->save("main_info",'facsimile',$model->id);
//                        $uploadForm->save("main_info",'trud_book',$model->id);
//                        $uploadForm->save("main_info",'is_work',$model->id);
//
//                        $pdf = new Pdf();
//                        $pdf->createCreditorPdf($model->id);
//                        $pdf->createBankrotBlank($model->id);
//                        $pdf->createPropertyPdf($model->id);
//
//                        return $this->redirect("/main/tickets");
//                    }
//                }
//            }else{
//                print_r($passport_model->getErrors());
//                print_r($model->getErrors());
//                print_r($inter_passport_model->getErrors());
//                die();
//            }
//
//
//            /*if($model->save()){
//                //echo"<pre>";print_r(Yii::$app->request->post());die();
//                $uploadForm->save('passport',$model->id);
//                $uploadForm->save('inn',$model->id);
//                $uploadForm->save('snils',$model->id);
//                echo"success";
//                //return $this->redirect('index');*/
//        }else{
//
//           // print_r($model->errors);
//           // print_r($passport_model->errors);
//           // print_r($inter_passport_model->errors);
//           //echo"errors;"; die();
//        }

        return $this->render('index', [
            'model' => $model,
            'directory' => $directory,
            'passport_model' => $passport_model,
            'inter_passport_model' => $inter_passport_model,
            'uploadForm' => $uploadForm,
            'family' => isset($family) ? $family : null,
            'brak' => isset($brak) ? $brak : null,
            'razvod' => isset($razvod) ? $razvod : null,
            'creditor' => isset($creditor) ? $creditor : null,
            'debitor' => isset($debitor) ? $debitor : null,
            'property' => isset($property) ? $property : null,
            'bank' => isset($bank) ? $bank : null,
            'shares' => isset($shares) ? $shares : null,
            'other_shares' => isset($other_shares) ? $other_shares : null,
            'valuable_property' => isset($valuable_property) ? $valuable_property : null,
            'deal' => isset($deal) ? $deal : null,
            'nalog' => isset($nalog) ? $nalog : null,
            'enforce_proc' => isset($enforce_proc) ? $enforce_proc : null,
            'other' => isset($other) ? $other : null,

            'brak' => isset($brak) ? $brak : null,
            'razvod' => isset($razvod) ? $razvod : null,

            'proxy' => isset($proxy) ? $proxy : null,
        ]);
    }

    public function actionDeleteImg()
    {
        if(\Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $delete = Upload::findOne($data['id']);

            $delete->deleteFile($data['model'],$data['ticket_id']);
        }

    }

    /**
     * Выводим список тикетов у пользователя
     * @return string
     */
    public function actionTickets(){
        $tickets = ClientTicket::getUserTickets();

        return $this->render('tickets', [
            'tickets' => $tickets,
        ]);
    }

    /**
     * Выводим игнформацию по конкретному тикету
     * @param $id
     * @return string
     */
    public function actionTicketDetail($id){
        $ticket = ClientTicket::findOne($id);
        $upload = Upload::find()->where(['model_id' => $id])->all();

        return $this->render('ticket_detail', [
            'ticket' => $ticket,
            'upload' => $upload,
        ]);
    }

    public function actionDeleteItem(){
        if(\Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            if($data['statment'] == "family"){
                Family::findOne($data['id'])->delete();
            }elseif($data['statment'] == "creditor"){
                Creditor::findOne($data['id'])->delete();
            }elseif($data['statment'] == "debitor"){
                Debitor::findOne($data['id'])->delete();
            }elseif($data['statment'] == "property"){
                Property::findOne($data['id'])->delete();
            }elseif($data['statment'] == "bank"){
                Bank::findOne($data['id'])->delete();
            }elseif($data['statment'] == "shares"){
                Shares::findOne($data['id'])->delete();
            }elseif($data['statment'] == "other_shares"){
                OtherShares::findOne($data['id'])->delete();
            }elseif($data['statment'] == "valuable_property"){
                ValuableProperty::findOne($data['id'])->delete();
            }elseif($data['statment'] == "deal"){
                Deal::findOne($data['id'])->delete();
            }elseif($data['statment'] == "nalog"){
                Nalog::findOne($data['id'])->delete();
            }elseif($data['statment'] == "enforce"){
                EnforceProc::findOne($data['id'])->delete();
            }elseif($data['statment'] == "other"){
                Other::findOne($data['id'])->delete();
            }elseif($data['statment'] == "sp"){
                Brak::findOne($data['id'])->delete();
                Razvod::findOne($data['id2'])->delete();
            }elseif($data['statment'] == "proxy"){
                Proxy::findOne($data['id'])->delete();
            }else{

            }

        }
        return true;
    }

    public function actionCloseTicket(){

        $ticket_id = ClientTicket::getActiveTicket();
        if($ticket_id){
            $result = TicketStatus::find()->where(['ticket_id' => $ticket_id])->one();
            $result->status = 1;
            if($result->save()){
                setcookie ("tab", 0);
                return $this->redirect('/main/tickets');
            }
        }
    }

}
