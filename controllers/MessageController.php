<?php

namespace app\controllers;

use app\models\User;
use Yii;
use app\models\Message;
use app\models\MessageSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends Controller
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
     * Lists all Message models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Message model.
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
     * Creates a new Message model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Message();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Message model.
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
     * Deletes an existing Message model.
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
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionChat($type)
    {
        $user = User::findOne(Yii::$app->user->id);
        if($type == "admin"){
            $this->layout = '/admin';
            $list = Message::find()
                ->select('chat_id,max(created_at) as created_at')
                ->groupBy('chat_id')
                ->asArray()
                ->all();

            ArrayHelper::multisort($list, ['created_at'], [SORT_DESC]);
        }else{
            $this->layout = '/user';
            $condition = ['and',
                ['<>','user_id',Yii::$app->user->id],
                ['=', 'chat_id' , Yii::$app->user->id],
                ['=', 'see', 0],
            ];
            Message::updateAll(['see' => 1],$condition);
            $dialog = Message::find()->where(['chat_id' => Yii::$app->user->id])->orderBy('created_at ASC')->all();
        }



        return $this->render('chat', [
            'type' => $type,
            'list' => isset($list) ? $list : null,
            'dialog' => isset($dialog) ? $dialog : null,
            'user' => $user,
        ]);
    }

    public function actionReloadUserList(){
        $data = Yii::$app->request->post();
        if(!Message::find()->where(['<>','user_id','admin_id'])->andWhere(['see' => 0])->count())
            return false;

        $list = Message::find()
            ->select('chat_id,max(created_at) as created_at')
            ->groupBy('chat_id')
            ->asArray()
            ->all();

        ArrayHelper::multisort($list, ['created_at'], [SORT_DESC]);

        return $this->renderPartial('_user_list',[
            'list' => $list,
        ]);
    }

    public function actionSelectDialog(){
        $data = Yii::$app->request->post();
        $dialog = Message::find()->where(['chat_id' => $data['chat_id']])->orderBy('created_at ASC')->all();
        $user = User::findOne($data['chat_id']);

        $condition = ['and',
            ['=','user_id',$data['chat_id']],
            ['=', 'chat_id' , $data['chat_id']],
            ['=', 'see', 0],
        ];
        Message::updateAll(['see' => 1],$condition);

        return $this->renderPartial('_dialog_page',[
            'dialog' => $dialog,
            'user' => $user
        ]);
    }

    public function actionSendMessage(){
        $data = Yii::$app->request->post();
        $message = new Message();
        $message->chat_id = $data['chat_id'];
        $message->user_id = Yii::$app->user->id;
        $message->admin_id = 0;
        $message->text = $data['text'];
        $message->see = 0;
        if($message->save()){
            $condition = ['and',
                ['<>','user_id',Yii::$app->user->id],
                ['=', 'chat_id' , $message->chat_id],
                ['=', 'see', 0],
            ];
            Message::updateAll(['see' => 1],$condition);
            return true;
        }

        else
            return false;

    }

    public function actionReloadDialogPage(){
        $data = Yii::$app->request->post();
        if(!Message::find()->where(['chat_id' => $data['chat_id']])->andWhere(['<>','user_id',Yii::$app->user->id])->andWhere(['see' => 0])->count() && !$data['flag'])
            return false;
        $dialog = Message::find()->where(['chat_id' => $data['chat_id']])->orderBy('created_at ASC')->all();
        $user = User::findOne($data['chat_id']);

        $condition = ['and',
            ['<>','user_id',Yii::$app->user->id],
            ['=', 'chat_id' , $data['chat_id']],
            ['=', 'see', 0],
        ];
        Message::updateAll(['see' => 1],$condition);

        return $this->renderPartial('_dialog_page',[
            'dialog' => $dialog,
            'user' => $user
        ]);
    }

}
