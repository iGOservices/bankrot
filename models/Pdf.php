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
        $upload->origin = "Опись имущества гражданина";
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
        $upload->origin = "Заявление о признании гражданина банкротом";
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
        $upload->origin = "Список кредиторов и должников гражданина";
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


    public function createAsbExportFile($id){
        $file = Pdf::createEmptyAsbFile($id);

        $model = ClientTicket::findOne($id);
        $passport_model = Passport::find()->where(['ticket_id' => $id])->one();
        $creditor_arr = Creditor::createPayArray($id);
        $debitor_arr = Debitor::createPayArray($id);
        $bank_arr = Bank::createPayArray($id);
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
            "Contacts" => ArrayHelper::merge($creditor_arr['creditor1'], $debitor_arr['debitor1']),
            "Inventory"=>[
                "Data"=>[
                    "Immovable"=>[
                        "Land" => [

                        ],
                        "Home" => [

                        ],
                        "Apartments" => [

                        ],
                        "Garages" => [

                        ],
                        "Other" => [

                        ]
                    ],
                    "Movable"=>[
                        "Cars" => [

                        ],
                        "Lorries" => [

                        ],
                        "Moto" => [

                        ],
                        "Agricultural" => [

                        ],
                        "Water" => [

                        ],
                        "Air" => [

                        ],
                        "Other" => [

                        ]
                    ],
                    "Accounts" => $bank_arr,
                    "Shares" => [

                    ],
                    "OtherSecurities" => [

                    ],
                    "Cash"=>[
                        "Fund" => [

                        ],
                        "Jewelry" => [

                        ],
                        "Art" => [

                        ],
                        "Professional" => [

                        ],
                        "Other" => [

                        ]
                    ]
                ]
            ],
            "Creditors"=> $creditor_arr['creditor2'],
            "Debtors"=>$debitor_arr['debitor2'],
            "Info" => [
                "version" => "1.0"
            ]
        ];
//        $html = [
//            "Main" => [
//                "Profile" => [
//                    "place_birth" => [
//                        "Country" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "Region" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "Area" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "City" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "Town" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "text" => "Россия, Респ Удмуртская, г Ижевск, ул Авангардная, дом 6а, квартира 12",
//                        "Street" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "HouseNumber" => "6а",
//                        "KorpusNumber" => "",
//                        "FlatNumber" => "12"
//                    ],
//                    "registration_address" => [
//                        "Country" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "Region" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "Area" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "City" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "Town" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "text" => "Россия, Респ Удмуртская, г Ижевск, ул Авангардная, дом 6а, корпус 12, квартира 12",
//                        "Street" => [
//                            "id" => "RUS",
//                            "text" => "Россия",
//                        ],
//                        "HouseNumber" => "6а",
//                        "KorpusNumber"=> "12",
//                        "FlatNumber" => "12"
//                    ],
//                    "last_name" => "Иванов",
//                    "first_name" => "Иван",
//                    "middle_name" => "Иванович",
//                    "last_fio" => "",
//                    "date_birth" => "14.10.2015",
//                    "snils" => "00000000000",
//                    "inn" => "0000000000",
//                    "identification_type" => "passport",
//                    "identification_serial" => "1234",
//                    "identification_number" => "123456",
//                    "identification_issued" => "УВД Октяборьского района",
//                ]
//            ],
//            "Contacts" => [
//                [
//                    "id" => "11195955-5802-2621-2116-d45b36a61067",
//                    "name" => "Петров Пётр Петрович",
//                    "type" => "physical",
//                    "inn" => "0000000000",
//                    "address" => [
//                        "Country" => [
//                            "id" => "RUS",
//                            "text" => "Россия"
//                        ],
//                        "Region" => [
//                            "id" => "18",
//                            "text" => "Респ Удмуртская"
//                        ],
//                        "Area" => [
//                            "id" => "",
//                            "text" => ""
//                        ],
//                        "City" => [
//                            "id" => "001",
//                            "text" => "г Ижевск"
//                        ],
//                        "Town" => [
//                            "id"=> "",
//                            "text"  => ""
//                        ],
//                        "text" => "Россия, Респ Удмуртская, г Ижевск, ул Авангардная, дом 5а , корпус 12, квартира 12",
//                        "Street" => [
//                            "id" => "0001",
//                            "text" => "ул Авангардная"
//                        ],
//                        "HouseNumber" => "5а ",
//                        "KorpusNumber" => "12",
//                        "FlatNumber" => "12"
//                    ],
//                    "type_contact" => "creditor",
//                    "text" => "Петров Пётр Петрович"
//                ]
//            ],
//            "Creditors" => [
//                "Data" => [
//                    "Monetary" => [
//                        [
//                            "creditor_id" => "11195955-5802-2621-2116-d45b36a61067",
//                            "content_obligation" => "Аренда",
//                            "business" => true,
//                            "occurrence_agreement" => "Договор Аренды",
//                            "occurrence_date" => "14.10.2015",
//                            "occurrence_number" => "12",
//                            "liabilities_total" => "1234",
//                            "liabilities_debt" => "123",
//                            "fines" => "12345",
//                            "description" => "Примечание 1",
//                            "group" => "0"
//                        ],
//                    ]
//                ]
//            ],
//            "Info" => [
//                "version" => "1.0"
//            ]
//        ];

        $fo = fopen($file, 'w') or die("can't open file");
        fwrite($fo, json_encode($html, JSON_UNESCAPED_UNICODE));
        fclose($fo);
        return true;
    }

}
