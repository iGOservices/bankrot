<?php

namespace app\models;

use Mpdf\Mpdf;
use Yii;
use yii\helpers\ArrayHelper;


class Pdf extends \yii\db\ActiveRecord
{
    /**
     * Формируем пустой исходный файл
     * @param $id
     * @param $file
     * @throws \Mpdf\MpdfException
     */
    public static function createEmptyPdfFile($id, $file){
        $dir = 'upload/'. $id . '/user_docs/';
        if(!is_dir($dir))
            mkdir($dir, 0777, true);
        file_put_contents($dir. $file .'.pdf', '');

        return $dir. $file .'.pdf';
    }



    public static function createEmptyAsbFile($id){
        $file = "export_asb";
        $dir = 'upload/'. $id . '/export_asb/';
        if(!is_dir($dir))
            mkdir($dir, 0777, true);
        file_put_contents($dir. $file .'.asb', '');

        return $dir. $file .'.asb';
    }


    public static function createPropertyPdf($id) {



        $client_ticket = ClientTicket::findOne($id);
        $passport = $client_ticket->passportByTicket;
        $property = $client_ticket->propertyByTicket;
        $bank = $client_ticket->bankByTicket;
        $shares = $client_ticket->sharesByTicket;
        $other_shares = $client_ticket->otherSharesByTicket;
        $valuable_property = $client_ticket->valuablePropertyByTicket;

        $file = Pdf::createEmptyPdfFile($id, 'property');
        $html = Yii::$app->controller->renderPartial('/pdf/property',[
            'client_ticket' => $client_ticket,
            'passport' => $passport,
            'property' => $property,
            'bank' => $bank,
            'shares' => $shares,
            'other_shares' => $other_shares,
            'valuable_property' => $valuable_property,
        ]);

        $upload = Upload::find()->where(['model_id' => $id])->andWhere(['model' => 'user_docs'])->andWhere(['name' => 'property'])->one();
        if(!$upload)
            $upload = new Upload();

        $upload->model = "user_docs";
        $upload->model_id = $id;
        $upload->origin = "Опись имущества гражданина(pdf)";
        $upload->name = "property";
        $upload->folder = "user_docs";
        $upload->ext = "pdf";
        $upload->user_id = Yii::$app->user->id;
        $upload->created_at = time();
        $upload->save();


        $mpdf = new mPDF;
        $mpdf->WriteHTML($html);
        //$mpdf->Output();
        $mpdf->Output($file, \Mpdf\Output\Destination::FILE);



    }

    public function createBankrotBlank($id) {

        $client_ticket = ClientTicket::findOne($id);
        $passport = $client_ticket->passportByTicket;
        $creditor = $client_ticket->creditorByTicket;
        $file = Pdf::createEmptyPdfFile($id, 'bankrot_blank');
        $html = Yii::$app->controller->renderPartial('/pdf/bankrot_blank',[
            'client_ticket' => $client_ticket,
            'passport' => $passport,
            'creditor' => $creditor,

        ]);

        $upload = Upload::find()->where(['model_id' => $id])->andWhere(['model' => 'user_docs'])->andWhere(['name' => 'bankrot_blank'])->one();
        if(!$upload)
            $upload = new Upload();
        $upload->model = "user_docs";
        $upload->model_id = $id;
        $upload->origin = "Заявление о признании гражданина банкротом(pdf)";
        $upload->name = "bankrot_blank";
        $upload->folder = "user_docs";
        $upload->ext = "pdf";
        $upload->user_id = Yii::$app->user->id;
        $upload->created_at = time();
        $upload->save();

        $mpdf = new mPDF;
        $mpdf->WriteHTML($html);
        //$mpdf->Output();
        $mpdf->Output($file, \Mpdf\Output\Destination::FILE);
    }

    public static function createCreditorPdf($id) {

        $client_ticket = ClientTicket::findOne($id);
        $passport = $client_ticket->passportByTicket;
        $creditor = $client_ticket->creditorByTicket;
        $debitor = $client_ticket->debitorByTicket;
        $file = Pdf::createEmptyPdfFile($id, 'creditor');
        $html = Yii::$app->controller->renderPartial('/pdf/creditor',[
            'client_ticket' => $client_ticket,
            'passport' => $passport,
            'creditor' => $creditor,
            'debitor' => $debitor,
        ]);

        $upload = Upload::find()->where(['model_id' => $id])->andWhere(['model' => 'user_docs'])->andWhere(['name' => 'creditor'])->one();
        if(!$upload)
            $upload = new Upload();
        $upload->model = "user_docs";
        $upload->model_id = $id;
        $upload->origin = "Список кредиторов и должников гражданина(pdf)";
        $upload->name = "creditor";
        $upload->folder = "user_docs";
        $upload->ext = "pdf";
        $upload->user_id = Yii::$app->user->id;
        $upload->created_at = time();
        $upload->save();

        $mpdf = new mPDF;
        $mpdf->WriteHTML($html);
        //$mpdf->Output();
        $mpdf->Output($file, \Mpdf\Output\Destination::FILE);
    }

    public static function createSamplePdf($id) {
        $client_ticket = ClientTicket::findOne($id);
        if(!$client_ticket){
            return false;
        }
        $region = $client_ticket->region;

        $result = CpoDirectory::find()->where(['region' => $region])->one();

        if(!$result){
            return false;
        }

        $file = Pdf::createEmptyPdfFile($id, 'sample');
        $html = Yii::$app->controller->renderPartial('/pdf/sample',[
            'client_ticket' => $client_ticket,
            'result' => $result,

        ]);
        //echo $html;die();

        $upload = Upload::find()->where(['model_id' => $id])->andWhere(['model' => 'user_docs'])->andWhere(['name' => 'sample'])->one();
        if(!$upload)
            $upload = new Upload();

        $upload->model = "user_docs";
        $upload->model_id = $id;
        $upload->origin = "Квитанция на оплату(pdf)";
        $upload->name = "sample";
        $upload->folder = "user_docs";
        $upload->ext = "pdf";
        $upload->user_id = Yii::$app->user->id;
        $upload->created_at = time();
        $upload->save();


        $mpdf = new mPDF;
        $mpdf->WriteHTML($html);
        //$mpdf->Output();
        $mpdf->Output($file, \Mpdf\Output\Destination::FILE);



    }


    public function createAsbExportFile($id){
        $file = Pdf::createEmptyAsbFile($id);
        $upload = Upload::find()->where(['model_id' => $id])->andWhere(['model' => 'export_asb'])->one();

        if(!$upload)
            $upload = new Upload();
        $upload->model = "export_asb";
        $upload->model_id = $id;
        $upload->origin = "Файл для экспорта в ПАУ";
        $upload->name = "export_asb";
        $upload->folder = "export_asb";
        $upload->ext = "asb";
        $upload->user_id = Yii::$app->user->id;
        $upload->created_at = time();
        $upload->save();

        $model = ClientTicket::findOne($id);
        $passport_model = Passport::find()->where(['ticket_id' => $id])->one();
        $creditor_arr = Creditor::createPayArray($id);
        $debitor_arr = Debitor::createPayArray($id);
        $bank_arr = Bank::createPayArray($id);
        $shares_arr = Shares::createPayArray($id);
        $other_shares_arr = OtherShares::createPayArray($id);
        $valuable_arr = ValuableProperty::createPayArray($id);
        $property_arr = Property::createPayArray($id);
       // echo"<pre>";print_r($creditor_arr);die();
        //echo"<pre>";print_r();die();
        $html = [
            "Main"=>[
                "Profile"=>[
                    "place_birth" => [
                        "Country" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "Region" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "Area" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "City" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "Town" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "text" => $model->birth_place,
                        "Street" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "HouseNumber" => "6а",
                        "KorpusNumber" => "",
                        "FlatNumber" => "12"
                    ],
                    "registration_address" => [
                        "Country" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "Region" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "Area" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "City" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "Town" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "text" => "Россия, Респ ".$model->region.", г ".$model->city.", ул ".$model->street . " , дом ".$model->house. ", корпус ". $model->corpuse . ", квартира ". $model->flat . "",
                        "Street" => [
                            "id" => "RUS",
                            "text" => "Россия",
                        ],
                        "HouseNumber" => "6а",
                        "KorpusNumber"=> "12",
                        "FlatNumber" => "12"
                    ],
                    "last_name" => $model->patronymic,
                    "first_name" => $model->name,
                    "middle_name" => $model->surname,
                    "last_fio" => $model->changed_fio,
                    "date_birth" => $model->birthday,
                    "snils" => $model->snils,
                    "inn" => $model->inn,
                    "identification_type" => "passport",
                    "identification_serial" => $passport_model->series,
                    "identification_number" => $passport_model->number,
                    "identification_issued" => $passport_model->given,
                ]
            ],
            "Contacts" => ArrayHelper::merge($creditor_arr['creditor1'], $debitor_arr['debitor1'],$valuable_arr['valuable1'],$property_arr['property1']),
            "Inventory"=>[
                "Data"=>[
                    "Immovable"=> $property_arr['immovable'],
                    "Movable"=> $property_arr['movable'],
                    "Accounts" => $bank_arr,
                    "Shares" => $shares_arr,
                    "OtherSecurities" => $other_shares_arr,
                    "Cash"=> $valuable_arr['valuable2'],
                ]
            ],
            "Creditors"=> $creditor_arr['creditor2'],
            "Debtors"=>$debitor_arr['debitor2'],
            "Info" => [
                "version" => "1.0"
            ]
        ];


        $fo = fopen($file, 'w') or die("can't open file");
        fwrite($fo, json_encode($html, JSON_UNESCAPED_UNICODE));
        fclose($fo);
        return true;
    }



}
