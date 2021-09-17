<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property int $chat_id
 * @property int $user_id
 * @property int $admin_id
 * @property string $text
 * @property int|null $see
 * @property int $updated_at
 * @property int $created_at
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chat_id', 'user_id', 'admin_id', 'text'], 'required'],
            [['chat_id', 'user_id', 'admin_id', 'see', 'updated_at', 'created_at'], 'integer'],
            [['text'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chat_id' => 'Chat ID',
            'user_id' => 'User ID',
            'admin_id' => 'Admin ID',
            'text' => 'Text',
            'see' => 'See',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
