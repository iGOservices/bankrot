<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Razvod;

/**
 * RazvodSearch represents the model behind the search form of `app\models\Razvod`.
 */
class RazvodSearch extends Razvod
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id', 'created_at', 'updated_at'], 'integer'],
            [['series', 'number', 'date', 'number_act', 'number_act_date', 'given'], 'safe'],
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
        $query = Razvod::find();

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
            'ticket_id' => $this->ticket_id,
            'date' => $this->date,
            'number_act_date' => $this->number_act_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'series', $this->series])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'number_act', $this->number_act])
            ->andFilterWhere(['like', 'given', $this->given]);

        return $dataProvider;
    }
}
