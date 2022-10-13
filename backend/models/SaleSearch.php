<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sale;

/**
 * SaleSearch represents the model behind the search form of `\backend\models\Sale`.
 */
class SaleSearch extends Sale
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'table_id', 'menu_id', 'qty', 'user_id', 'bill_no'], 'integer'],
            [['price', 'amount'], 'number'],
            [['date'], 'safe'],
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
        $query = Sale::find();

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
            'table_id' => $this->table_id,
            'menu_id' => $this->menu_id,
            'qty' => $this->qty,
            'price' => $this->price,
            'amount' => $this->amount,
            'user_id' => $this->user_id,
            'bill_no' => $this->bill_no,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date]);
        return $dataProvider;
    }

        /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function benifit($params)
    {

        $query = Sale::find();

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
            'table_id' => $this->table_id,
            'menu_id' => $this->menu_id,
            'qty' => $this->qty,
            'price' => $this->price,
            'amount' => $this->amount,
            'user_id' => $this->user_id,
            'bill_no' => $this->bill_no,
        ]);

        $query->andFilterWhere(['like', 'date', $this->date]);
        return $dataProvider;
    }
}
