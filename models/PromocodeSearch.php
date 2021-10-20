<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Promocode;

/**
 * PromocodeSearch represents the model behind the search form of `app\models\Promocode`.
 */
class PromocodeSearch extends Promocode
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'discount', 'service_id', 'active', 'created_at', 'updated_at','is_use','user_activate'], 'integer'],
            [['code','period'], 'safe'],
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
        $query = Promocode::find();

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
            'discount' => $this->discount,
            'service_id' => $this->service_id,
            'is_use' => $this->is_use,
            'user_activate' => $this->user_activate,
            'period' => $this->period,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
