<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property string|null $description
 * @property string $domen
 * @property int $created_at
 * @property int $updated_at
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'domen'], 'required'],
            [['price', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['title', 'domen'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название тарифа',
            'price' => 'Цена',
            'description' => 'Описание',
            'domen' => 'Домен',
            //'created_at' => 'Created At',
            //'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
