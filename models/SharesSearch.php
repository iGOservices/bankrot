<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shares;

/**
 * SharesSearch represents the model behind the search form of `app\models\Shares`.
 */
class SharesSearch extends Shares
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id', 'company_capital', 'shares_count', 'created_at', 'updated_at'], 'integer'],
            [['name', 'location', 'inn', 'share', 'dogovor_number', 'date', 'other'], 'safe'],
            [['nominal_cost', 'total_cost'], 'number'],
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
        $query = Shares::find();

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
            'company_capital' => $this->company_capital,
            'nominal_cost' => $this->nominal_cost,
            'shares_count' => $this->shares_count,
            'total_cost' => $this->total_cost,
            'date' => $this->date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'share', $this->share])
            ->andFilterWhere(['like', 'dogovor_number', $this->dogovor_number])
            ->andFilterWhere(['like', 'other', $this->other]);

        return $dataProvider;
    }
}
