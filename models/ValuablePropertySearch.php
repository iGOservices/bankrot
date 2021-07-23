<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ValuableProperty;

/**
 * ValuablePropertySearch represents the model behind the search form of `app\models\ValuableProperty`.
 */
class ValuablePropertySearch extends ValuableProperty
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id', 'property_type', 'location', 'house', 'corpus', 'office', 'post_index', 'active_status', 'zalog_type', 'zalog_inn', 'created_at', 'updated_at'], 'integer'],
            [['name', 'coutry', 'region', 'district', 'city', 'street', 'org_name', 'dogovor_number', 'dogovor_date', 'zalog_name', 'zalog_address', 'zalog_dogovor', 'other'], 'safe'],
            [['cost'], 'number'],
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
        $query = ValuableProperty::find();

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
            'property_type' => $this->property_type,
            'cost' => $this->cost,
            'location' => $this->location,
            'house' => $this->house,
            'corpus' => $this->corpus,
            'office' => $this->office,
            'post_index' => $this->post_index,
            'dogovor_date' => $this->dogovor_date,
            'active_status' => $this->active_status,
            'zalog_type' => $this->zalog_type,
            'zalog_inn' => $this->zalog_inn,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'coutry', $this->coutry])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'org_name', $this->org_name])
            ->andFilterWhere(['like', 'dogovor_number', $this->dogovor_number])
            ->andFilterWhere(['like', 'zalog_name', $this->zalog_name])
            ->andFilterWhere(['like', 'zalog_address', $this->zalog_address])
            ->andFilterWhere(['like', 'zalog_dogovor', $this->zalog_dogovor])
            ->andFilterWhere(['like', 'other', $this->other]);

        return $dataProvider;
    }
}
