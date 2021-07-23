<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Family;

/**
 * FamilySearch represents the model behind the search form of `app\models\Family`.
 */
class FamilySearch extends Family
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id', 'type', 'birth_country', 'created_at', 'updated_at'], 'integer'],
            [['name', 'surname', 'patronymic', 'birthday', 'inn', 'birth_series', 'birth_number', 'birth_date', 'birth_number_act', 'birth_number_act_date', 'given'], 'safe'],
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
        $query = Family::find();

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
            'type' => $this->type,
            'birthday' => $this->birthday,
            'birth_country' => $this->birth_country,
            'birth_date' => $this->birth_date,
            'birth_number_act_date' => $this->birth_number_act_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'birth_series', $this->birth_series])
            ->andFilterWhere(['like', 'birth_number', $this->birth_number])
            ->andFilterWhere(['like', 'birth_number_act', $this->birth_number_act])
            ->andFilterWhere(['like', 'given', $this->given]);

        return $dataProvider;
    }
}
