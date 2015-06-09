<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Beli;

/**
 * BeliSearch represents the model behind the search form about `backend\models\Beli`.
 */
class BeliSearch extends Beli
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'supplier_id', 'kain_id', 'harga', 'sett'], 'integer'],
            [['nomor', 'tanggal', 'no_nota'], 'safe'],
            [['total_berat'], 'number'],
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
        $query = Beli::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'supplier_id' => $this->supplier_id,
            'tanggal' => $this->tanggal,
            'kain_id' => $this->kain_id,
            'harga' => $this->harga,
            'sett' => $this->sett,
            'total_berat' => $this->total_berat,
        ]);

        $query->andFilterWhere(['like', 'nomor', $this->nomor])
            ->andFilterWhere(['like', 'no_nota', $this->no_nota]);

        return $dataProvider;
    }
}
