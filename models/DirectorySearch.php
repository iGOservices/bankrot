<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Directory;

/**
 * DirectorySearch represents the model behind the search form of `app\models\Directory`.
 */
class DirectorySearch extends Directory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id', 'surname', 'patronymic', 'gender', 'birthday', 'birth_place', 'inn', 'snils', 'registr_address', 'fact_address', 'passport_id', 'inter_passsport_id', 'mail', 'phone', 'is_ip', 'changed_fio', 'facsimile'], 'integer'],
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
        $query = Directory::find();

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
            'name' => $this->name,
            'id' => $this->id,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'birth_place' => $this->birth_place,
            'inn' => $this->inn,
            'snils' => $this->snils,
            'registr_address' => $this->registr_address,
            'fact_address' => $this->fact_address,
            'passport_id' => $this->passport_id,
            'inter_passsport_id' => $this->inter_passsport_id,
            'mail' => $this->mail,
            'phone' => $this->phone,
            'is_ip' => $this->is_ip,
            'changed_fio' => $this->changed_fio,
            'facsimile' => $this->facsimile,
        ]);

        return $dataProvider;
    }
}
