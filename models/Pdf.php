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
        $dir = 'web/upload/'. $id . '/user_docs/';
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


    public static function createDocx(){


        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(14);

        $section = $phpWord->addSection();



        $sectionStyle = array(

            'orientation' => 'landscape',
            'marginTop' => Converter::pixelToTwip(10),
            'marginLeft' => 600,
            'marginRight' => 600,
            'colsNum' => 1,
            'pageNumberingStart' => 1,
            'borderBottomSize'=>100,
            'borderBottomColor'=>'C0C0C0'

        );
        $section = $phpWord->addSection($sectionStyle);


// Adding Text element with font customized inline...

        $section->addText('Приложение №1', ['size'=>8], [ 'align' => 'right' ]);
        $section->addText('К приказу Министерства', ['size'=>8], [ 'align' => 'right' ]);
        $section->addText('экономического развития РФ ', ['size'=>8], [ 'align' => 'right' ]);
        $section->addText('от 5 августа 2015 г.№530', ['size'=>8], [ 'align' => 'right' ]);


        $section->addTextBreak(1);

        $center = $phpWord->addParagraphStyle('p2Style', array('align'=>'center','marginTop' => 1));

        $section->addText('Список кредиторов и должников гражданина',array('bold' => true,'name'=>'Times New Roman','size' => 16),$center);


        $section->addTextBreak(1); // перенос строки

        $styleTable = array('borderSize' => 1, 'borderColor' => '999999');
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan2 = array('gridSpan' => 2, 'valign' => 'center');
        $cellColSpan3 = array('gridSpan' => 3, 'valign' => 'center');

        $cellHCentered = array('align' => 'center');
        $cellVCentered = array('valign' => 'center');

        $phpWord->addTableStyle('Colspan Rowspan', $styleTable);
        $table = $section->addTable('Colspan Rowspan');
        $table->addRow(null, array('tblHeader' => true));
        $table->addCell(2000, $cellColSpan3)->addText('Информация о гражданине', array('bold' => true), $cellHCentered);

        $table->addRow();
        $table->addCell(1000, $cellVCentered)->addText('фамилия', null, $cellHCentered);
        $table->addCell(3000, $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('имя', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('отчество', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText("в случае изменения фамилии,\n имени, отчества указать прежние фамилии, имена, отчества", null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('дата рождения', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('место рождения', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('СНИЛС', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('ИНН', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);

        $table->addRow(null);
        $table->addCell(2000, $cellColSpan3)->addText('документ, удостоверяющий личность', [], []);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('вид документа', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);


        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('серия (при наличии) и номер', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);


        $table->addRow(null);
        $table->addCell(2000, $cellColSpan3)->addText('адрес регистрации по месту жительства в Российской Федерации', [], []);


        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('субъект Российской Федерации', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('обязательно', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('район', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('город', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('населенный пункт (село, поселок и так далее)', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('улица (проспект, переулок и так далее)', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('номер дома (владения)', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('номер корпуса (строения)', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);

        $table->addRow();
        $table->addCell(2000, $cellVCentered)->addText('номер квартиры (офиса)', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('при наличии', null, $cellHCentered);
        $table->addCell(2000, $cellVCentered)->addText('1234123', null, $cellHCentered);


        $section->addPageBreak();



//        $table->addRow();
//        $table->addCell(2000, $cellRowSpan)->addText('rowspan=2 '
//            . '(need one null cell under)', null, $cellHCentered);
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(2000, $cellRowSpan)->addText('rowspan=3 '
//            . '(nedd 2 null celss under)', null, $cellHCentered);
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//
//        $table->addRow();
//        $table->addCell(null, $cellRowContinue); // 1 пустая в колонке 1
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(null, $cellRowContinue); // 1 пустая в колонке 3
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//
//
//        $table->addRow();
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(null, $cellRowContinue);  // 2 пустая в колонке 3
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//
//
//        $table->addRow();
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);
//        $table->addCell(2000, $cellVCentered)->addText('Т', null, $cellHCentered);




// Saving the document as OOXML file...
//        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
//        $objWriter->save('helloWorld.docx');

// Saving the document as ODF file...
//        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
//        $objWriter->save('helloWorld.odt');

// Saving the document as HTML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save("php://output");
        //$objWriter->save('helloWorld.html');

    }

}
