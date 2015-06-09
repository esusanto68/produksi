<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Kain;

/**
 * KainSearch represents the model behind the search form about `frontend\models\Kain`.
 */
class KainSearch extends Kain
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'harga', 'sett'], 'integer'],
            [['kode'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Kain::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' =>  ['defaultOrder' => ['kode'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'harga' => $this->harga,
            'sett' => $this->sett,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode]);

        return $dataProvider;
    }
}
