<?php

namespace app\models;

use Mpdf\Mpdf;
use Yii;


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
        file_put_contents($dir. $file .'.user_docs', '');

        return $dir. $file .'.pdf';
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

    public function createCreditorPdf($id) {

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


}
