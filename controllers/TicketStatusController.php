<?php

namespace app\controllers;

use app\models\Bank;
use app\models\Brak;
use app\models\ClientTicket;
use app\models\Creditor;
use app\models\Deal;
use app\models\Debitor;
use app\models\EnforceProc;
use app\models\Family;
use app\models\InterPassport;
use app\models\Nalog;
use app\models\Other;
use app\models\OtherShares;
use app\models\Passport;
use app\models\Property;
use app\models\Proxy;
use app\models\Razvod;
use app\models\Shares;
use app\models\ValuableProperty;
use Yii;
use app\models\TicketStatus;
use app\models\TicketStatusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketStatusController implements the CRUD actions for TicketStatus model.
 */
class TicketStatusController extends Controller
{
    public $layout = '/admin';
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
     * Lists all TicketStatus models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TicketStatusSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TicketStatus model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $client_ticket = ClientTicket::findOne($model->ticket_id);
        $passport_model = Passport::find()->where(['ticket_id' => $model->ticket_id])->one();
        $inter_passport_model = InterPassport::find()->where(['ticket_id' => $model->ticket_id])->one();
        $family = Family::find()->where(['ticket_id' => $model->ticket_id])->all();
        $brak =Brak::find()->where(['ticket_id' => $model->ticket_id])->all();
        $razvod = Razvod::find()->where(['ticket_id' => $model->ticket_id])->all();
        $creditor = Creditor::find()->where(['ticket_id' => $model->ticket_id])->all();
        $debitor = Debitor::find()->where(['ticket_id' => $model->ticket_id])->all();
        $property = Property::find()->where(['ticket_id' => $model->ticket_id])->all();
        $bank = Bank::find()->where(['ticket_id' => $model->ticket_id])->all();
        $shares = Shares::find()->where(['ticket_id' => $model->ticket_id])->all();
        $other_shares = OtherShares::find()->where(['ticket_id' => $model->ticket_id])->all();
        $valuable_property = ValuableProperty::find()->where(['ticket_id' => $model->ticket_id])->all();
        $deal = Deal::find()->where(['ticket_id' => $model->ticket_id])->all();
        $nalog = Nalog::find()->where(['ticket_id' => $model->ticket_id])->all();
        $enforce_proc = EnforceProc::find()->where(['ticket_id' => $model->ticket_id])->all();
        $other = Other::find()->where(['ticket_id' => $model->ticket_id])->all();

        $brak = Brak::find()->where(['ticket_id' => $model->ticket_id])->all();
        $razvod = Razvod::find()->where(['ticket_id' => $model->ticket_id])->all();

        $proxy = Proxy::find()->where(['ticket_id' => $model->ticket_id])->one();
        return $this->render('view', [
            'model' => $model,
            'client_ticket' => $client_ticket,
            'passport_model' => $passport_model,
            'inter_passport_model' => $inter_passport_model,
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

    /**
     * Creates a new TicketStatus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TicketStatus();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TicketStatus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TicketStatus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TicketStatus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TicketStatus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TicketStatus::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
