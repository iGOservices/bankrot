<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CpoDirectory;

/**
 * CpoDirectorySearch represents the model behind the search form of `app\models\CpoDirectory`.
 */
class CpoDirectorySearch extends CpoDirectory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'recipient_inn', 'recipient_kpp', 'bik', 'oktmo', 'updated_at', 'created_at'], 'integer'],
            [['recipient', 'checking_account', 'bank', 'correspondent_account', 'kbk', 'payment_name','region'], 'safe'],
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
        $query = CpoDirectory::find();

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
            'recipient_inn' => $this->recipient_inn,
            'recipient_kpp' => $this->recipient_kpp,
            'bik' => $this->bik,
            'oktmo' => $this->oktmo,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'recipient', $this->recipient])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'checking_account', $this->checking_account])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'correspondent_account', $this->correspondent_account])
            ->andFilterWhere(['like', 'kbk', $this->kbk])
            ->andFilterWhere(['like', 'payment_name', $this->payment_name]);

        return $dataProvider;
    }
}
