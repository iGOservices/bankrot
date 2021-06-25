<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ClientMainInfo;

/**
 * ClientMainInfoSearch represents the model behind the search form of `app\models\ClientMainInfo`.
 */
class ClientMainInfoSearch extends ClientMainInfo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'passport_id', 'inter_passsport_id', 'phone', 'is_ip', 'facsimile', 'created_at', 'updated_at'], 'integer'],
            [['name', 'surname', 'patronymic', 'birthday', 'birth_place', 'inn', 'snils', 'registr_address', 'fact_address', 'mail', 'changed_fio'], 'safe'],
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
        $query = ClientMainInfo::find();

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
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'passport_id' => $this->passport_id,
            'inter_passsport_id' => $this->inter_passsport_id,
            'phone' => $this->phone,
            'is_ip' => $this->is_ip,
            'facsimile' => $this->facsimile,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'birth_place', $this->birth_place])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'snils', $this->snils])
            ->andFilterWhere(['like', 'registr_address', $this->registr_address])
            ->andFilterWhere(['like', 'fact_address', $this->fact_address])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'changed_fio', $this->changed_fio]);

        return $dataProvider;
    }
}
