<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Promocode;
use app\models\PromocodeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PromocodeController implements the CRUD actions for Promocode model.
 */
class PromocodeController extends Controller
{
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
     * Lists all Promocode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PromocodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Promocode model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Promocode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Promocode();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Promocode model.
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
     * Deletes an existing Promocode model.
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
     * Finds the Promocode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Promocode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Promocode::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionActivatePromocode(){
        if(\Yii::$app->request->isAjax) {

            $data = Yii::$app->request->post();
            //print_r($data);die();
            $promocode = Promocode::find()
                ->where(['code' => $data['promocode']])
                ->andWhere(['service_id' => $data['service_id']])
                ->andWhere(['active' => 1])
                ->one();
            if($promocode){
                $result = [
                    'success' => true,
                    'message' => "<p>Промокод успешно применен!</p>",
                    'discount' => $promocode->discount,
                    'code' => $data['promocode'],
                ];
                if($promocode->period < date("Y-m-d")){
                    $result = [
                        'success' => false,
                        'message' => "<p>Период действия промокода закончился!</p>",
                        'discount' => $promocode->discount
                    ];
                }
                if($promocode->is_use){
                    $result = [
                        'success' => false,
                        'message' => "<p>Промокод уже был применен!</p>",
                        'discount' => $promocode->discount
                    ];
                }
            }else{
                $result = [
                    'success' => false,
                    'message' => "<p>Промокод не найден!</p>"
                ];
            }

            return json_encode($result);

        }
    }
}
