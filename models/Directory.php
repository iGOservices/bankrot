<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "directory".
 *
 * @property int $id
 * @property int $type
 * @property string $name
 * @property string $title
 * @property int $active
 * @property string|null $prompt
 * @property int $prompt_active
 */
class Directory extends \yii\db\ActiveRecord
{
    public static $active = [
        0 => 'Не показывать',
        1 => 'Показывать'
    ];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'directory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required'],
            [['type', 'active', 'prompt_active'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['prompt','title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип услуги',
            'name' => 'name',
            'title' => 'Наименование поля',
            'active' => 'Показывать поле',
            'prompt' => 'Текст подсказки',
            'prompt_active' => 'Показывать подсказку',
        ];
    }
}
