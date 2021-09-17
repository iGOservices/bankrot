<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Message;

/**
 * MessageSearch represents the model behind the search form of `app\models\Message`.
 */
class MessageSearch extends Message
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'chat_id', 'user_id', 'admin_id', 'see', 'updated_at', 'created_at'], 'integer'],
            [['text'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Message::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'chat_id' => $this->chat_id,
            'user_id' => $this->user_id,
            'admin_id' => $this->admin_id,
            'see' => $this->see,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
