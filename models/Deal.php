<?php

namespace app\models;

use Yii;
use yii\base\BaseObject;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "deal".
 *
 * @property int $id
 * @property int $ticket_id
 * @property int|null $type
 * @property string|null $description
 * @property string|null $date
 * @property string|null $name
 * @property int|null $inn
 * @property int $created_at
 * @property int $updated_at
 */
class Deal extends \yii\db\ActiveRecord
{

    public static $type = [
        '1' => 'Недвижимое имущество',
        '2' => 'Движимое имущество',
        '3' => 'Ценные бумаги',
        '4' => 'Доли в уставном капитале',
        '5' => 'Другое стоимостью > 300000 руб.',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id'], 'required'],
            [['ticket_id', 'type', 'inn', 'created_at', 'updated_at'], 'integer'],
            [['date'], 'safe'],
            [['description', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_id' => 'Ticket ID',
            'type' => 'Предмет сделки',
            'description' => 'Описание',
            'date' => 'Дата',
            'name' => 'Имя контрагента',
            'inn' => 'ИНН контрагента',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getDealFiles()
    {
        return $this->hasMany(Upload::className(), ['model_id' => 'id'])->where(['like','model','%deal%',false]);
    }

    public static function saveDeal($ticket_id){
//        $ids = ArrayHelper::getColumn(Deal::find()->where(['ticket_id' => $ticket_id])->all(), 'id');
//
//        $data = Yii::$app->request->post('Deal');
//        $count = $data ? count($data) : 0;
//        $deals = [];
//
//        for ($i = 0; $i < $count; $i++) {
//
//            if(isset($ids[$i])){
//                $deals[$i] = Deal::findOne($ids[$i]);
//            }else{
//                $deals[$i] = new Deal();
//            }
//        }
//        $uploadForm = new UploadForm();
//
//        $result = true;
//
//        foreach ($deals as $i => $deal) {
//            $deal->ticket_id = $ticket_id;
//            if (!empty($data[$i]) && $deal->load($data[$i], '')) {
//                if(!$deal->save()){
//                    $result = false;
//                }else{
//                    $uploadForm->save("deal","[$i]deal",$ticket_id);
//                }
//            }
//        }
//
//        return $result;


        $uploadForm = new UploadForm();
        $result = true;
//        $ids = ArrayHelper::getColumn(Family::find()->where(['ticket_id' => $ticket_id])->all(), 'id');

        $data = Yii::$app->request->post('Deal');
        //echo"<pre>";print_r($data);die();
        if($data) {
            foreach ($data as $key => $item) {
                if ($item['id']) {
                    $deal = Deal::findOne($item['id']);
                } else {
                    $deal = new Deal();
                    $deal->ticket_id = $ticket_id;
                }

                if ($deal->load($item, '')) {
                    if ($deal->save()) {
                        $uploadForm->save("deal", "[$key]deal", $deal->id, $ticket_id);
                    } else {
                        $result = false;
                    }
                }
            }
        }

        return $result;
    }
}
