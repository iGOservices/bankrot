<?php

namespace app\controllers;

use app\models\ClientTicket;
use app\models\ClientTicketSearch;
use app\models\SignupForm;
use app\models\UploadForm;
use app\models\VerifyCode;
use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new ClientTicketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$type = null)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionUpdateUser($id)
    {
        $this->layout = "/user";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->phone = preg_replace('~\D+~', '', $model->phone);
            if($model->save())
                return $this->redirect(['user/update-user', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionSendCallRequest()
    {

        $data = Yii::$app->request->post();

        //ищем по номеру телефона
        $phone = preg_replace('/[^0-9]/', '', $data['phone']);

        if($phone){
            if(User::findByPhone($phone)){
                $array = [
                    'data' => false,
                    'type' => 1
                ];
                return json_encode($array);
            }
        }

        if($data['username']){
            if(User::find()->where(['username' => $data['username']])->one()){
                $array = [
                    'data' => false,
                    'type' => 2
                ];
                return json_encode($array);
            }
        }

        if($data['email']){
            if(User::findByEmail($data['email'])){
                $array = [
                    'data' => false,
                    'type' => 3
                ];
                return json_encode($array);
            }
        }


        $model = VerifyCode::findByPhone($phone);
        if($model)
        {
            if($model->count < 3)
            {
                $flag = VerifyCode::repeatCallRequest($model->ucaller_id);
                $model->repeatRequest();
            }else $flag = false;
        }else
        {

            $code = rand(1000,9999);
            $ucaller_id = VerifyCode::sendCallRequest($phone,$code);
            if($ucaller_id)
            {
                $flag = VerifyCode::createRequest($phone, $code, $ucaller_id);
            }else $flag = false;
        }

        $flag = true;
        if($flag)
        {
            $array = [
                'data' => true
            ];
        }else
        {
            $array = [
                'data' => false,
                'type' => 4
            ];
        }

        return json_encode($array);
    }


    public function actionSendCallAnswer()
    {
        $data = Yii::$app->request->post();

        //ищем по номеру телефона
        $phone = preg_replace('/[^0-9]/', '', $data['phone']);
        $code = $data['code'];

        $model = VerifyCode::findByPhone($phone);
        if($model && $model->code == $code) $flag = true;
        else $flag = false;

        if($flag)
        {
            $array = [
                'data' => true,
            ];
        }else
        {
            $array = [
                'data' => false,
            ];
        }

        return json_encode($array);
    }


}
