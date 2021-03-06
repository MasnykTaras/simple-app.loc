<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Address;

/**
 * SearchAddress represents the model behind the search form of `app\models\Address`.
 */
class SearchAddress extends Address
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'street_number', 'office_number', 'user_id'], 'integer'],
            [['post_index'], 'string'],
            [['state', 'city', 'street'], 'safe'],
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
        if(isset($params[id]) && !empty($params[id])){
            $query = Address::find()->where(['user_id' => $params['id']]);
        }else{
          $query = Address::find();  
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'forcePageParam' => false,
                'pageSizeParam' => false,
                'pageSize' => 5
            ]
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
            'post_index' => $this->post_index,
            'street_number' => $this->street_number,
            'office_number' => $this->office_number,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'street', $this->street]);

        return $dataProvider;
    }
}
