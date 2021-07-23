<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Debitor;

/**
 * DebitorSearch represents the model behind the search form of `app\models\Debitor`.
 */
class DebitorSearch extends Debitor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id', 'group', 'commitment', 'is_predprin', 'statment', 'house', 'corpus', 'flat', 'post_index', 'sum_statment', 'sum_dolg', 'base', 'base_num', 'created_at', 'updated_at'], 'integer'],
            [['name', 'inn', 'coutry', 'region', 'district', 'city', 'street', 'forfeit', 'base_date', 'other'], 'safe'],
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
        $query = Debitor::find();

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
            'commitment' => $this->commitment,
            'is_predprin' => $this->is_predprin,
            'statment' => $this->statment,
            'house' => $this->house,
            'corpus' => $this->corpus,
            'flat' => $this->flat,
            'post_index' => $this->post_index,
            'sum_statment' => $this->sum_statment,
            'sum_dolg' => $this->sum_dolg,
            'base' => $this->base,
            'base_date' => $this->base_date,
            'base_num' => $this->base_num,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'coutry', $this->coutry])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'forfeit', $this->forfeit])
            ->andFilterWhere(['like', 'other', $this->other]);

        return $dataProvider;
    }
}
