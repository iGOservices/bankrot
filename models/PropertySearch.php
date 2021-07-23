<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Property;

/**
 * PropertySearch represents the model behind the search form of `app\models\Property`.
 */
class PropertySearch extends Property
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id', 'group', 'property_view', 'house', 'corpus', 'office', 'post_index', 'cost', 'active_status', 'zalog_post_index', 'created_at', 'updated_at'], 'integer'],
            [['property_type', 'share', 'other_owners', 'active_name', 'square', 'reg_number', 'vin_number', 'date_sved', 'num_sved', 'coutry', 'region', 'district', 'city', 'street', 'zalog_name', 'zalog_dogovor', 'other'], 'safe'],
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
        $query = Property::find();

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
            'group' => $this->group,
            'property_view' => $this->property_view,
            'date_sved' => $this->date_sved,
            'house' => $this->house,
            'corpus' => $this->corpus,
            'office' => $this->office,
            'post_index' => $this->post_index,
            'cost' => $this->cost,
            'active_status' => $this->active_status,
            'zalog_post_index' => $this->zalog_post_index,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'property_type', $this->property_type])
            ->andFilterWhere(['like', 'share', $this->share])
            ->andFilterWhere(['like', 'other_owners', $this->other_owners])
            ->andFilterWhere(['like', 'active_name', $this->active_name])
            ->andFilterWhere(['like', 'square', $this->square])
            ->andFilterWhere(['like', 'reg_number', $this->reg_number])
            ->andFilterWhere(['like', 'vin_number', $this->vin_number])
            ->andFilterWhere(['like', 'num_sved', $this->num_sved])
            ->andFilterWhere(['like', 'coutry', $this->coutry])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'zalog_name', $this->zalog_name])
            ->andFilterWhere(['like', 'zalog_dogovor', $this->zalog_dogovor])
            ->andFilterWhere(['like', 'other', $this->other]);

        return $dataProvider;
    }
}
