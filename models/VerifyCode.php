<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "verify_code".
 *
 * @property int $id
 * @property int $phone
 * @property int $code
 * @property int $ucaller_id
 * @property int|null $count
 * @property int $updated_at
 * @property int $created_at
 */
class VerifyCode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'verify_code';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'code', 'ucaller_id'], 'required'],
            [['phone', 'code', 'ucaller_id', 'count', 'updated_at', 'created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'code' => 'Code',
            'ucaller_id' =>  'ucaller_id',
            'count' => 'Count',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @param $phone
     * @return array|VerifyCode|null
     */
    public static function findByPhone($phone)
    {
        return self::find()
            ->where(['phone' => $phone])
            ->andWhere(['>', 'created_at', time() - 300])
            ->one();
    }

    public static function createRequest($phone, $code, $ucaller_id)
    {
        $model = new self();
        $model->phone = $phone;
        $model->code = $code;
        $model->ucaller_id = $ucaller_id;
        $model->count = 1;

        return $model->save();
    }

    public function repeatRequest()
    {
        $this->count = $this->count + 1;

        return $this->save(false);
    }

    public static function sendCallRequest($phone,$code)
    {
        $service_id = Yii::$app->params['serviceUcaller']['service_id'];
        $secret_key = Yii::$app->params['serviceUcaller']['secret_key'];
        $request = file_get_contents('https://api.ucaller.ru/v1.0/initCall?service_id='.$service_id.'&key='.$secret_key.'&phone='.$phone.'&code='.$code);
        $request = json_decode($request, true);

        if($request['status'] == true)
            return $request['ucaller_id'];
        else
            return false;
    }

    public static function repeatCallRequest($ucaller_id)
    {
        $service_id = Yii::$app->params['serviceUcaller']['service_id'];
        $secret_key = Yii::$app->params['serviceUcaller']['secret_key'];
        $request = file_get_contents('https://api.ucaller.ru/v1.0/initRepeat?service_id='.$service_id.'&key='.$secret_key.'&uid='.$ucaller_id);
        $request = json_decode($request, true);
        if($request['status'] == true)
            return true;
        else
            return false;
    }
}
