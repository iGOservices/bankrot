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
        $dir = 'upload/'. $id . '/pdf/';
        if(!is_dir($dir))
            mkdir($dir, 0777, true);
        file_put_contents($dir. $file .'.pdf', '');

        return $dir. $file .'.pdf';
    }


    public function createPropertyPdf($id) {

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
        $mpdf = new mPDF;
        $mpdf->WriteHTML($html);
        //$mpdf->Output();
        $mpdf->Output($file, \Mpdf\Output\Destination::FILE);


    }


}
