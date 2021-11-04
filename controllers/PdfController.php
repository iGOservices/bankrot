<?php

namespace app\controllers;

use app\models\ClientTicket;
use app\models\Docx;
use app\models\Passport;
use app\models\Pdf;
use app\models\Property;
use Mpdf\Mpdf;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class PdfController extends Controller
{
    public function actionCreateUserDocuments($id,$ticket_status_id = null){
        //Pdf::createDocx();

        Pdf::createPropertyPdf($id);
        Pdf::createCreditorPdf($id);
        Pdf::createBankrotBlank($id);
        Pdf::createSamplePdf($id);
        Docx::createCreditorDocx($id);
        Docx::createPropertyDocx($id);
        Docx::createPaymentSample($id);
        if($ticket_status_id){
            $this->redirect(['ticket-status/view', 'id' => $ticket_status_id]);
        }
    }



    public function actionCreateExportPayDocument($id,$ticket_status_id = null){
        Pdf::createAsbExportFile($id);

        if($ticket_status_id){
            $this->redirect(['ticket-status/view', 'id' => $ticket_status_id]);
        }
    }

}
