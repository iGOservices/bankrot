<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TicketStatus;

/**
 * TicketStatusSearch represents the model behind the search form of `app\models\TicketStatus`.
 */
class TicketStatusSearch extends TicketStatus
{
    public $user_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id', 'status','type', 'created_at', 'updated_at','user_id'], 'integer'],
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
        $query = TicketStatus::find()->joinWith('clientTicket');

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

        $dataProvider->setSort([
            'attributes' => [
                'user_id' => [
                    'asc' => ['user_id' => SORT_ASC, 'user_id' => SORT_ASC],
                    'desc' => ['user_id' => SORT_DESC, 'user_id' => SORT_DESC],
                    'label' => 'user_id',
                    'default' => SORT_ASC
                ],
                'ticket_id',
                'status',
                'type',
                'created_at',
                'updated_at',

            ]
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ticket_id' => $this->ticket_id,
            'status' => $this->status,
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'client_ticket.user_id' => $this->user_id,
        ]);

        return $dataProvider;
    }
}
