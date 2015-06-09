<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\KainDtl;

/**
 * KainDtlSearch represents the model behind the search form about `frontend\models\KainDtl`.
 */
class KainDtlSearch extends KainDtl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'beli_id', 'kain_id', 'berat1', 'berat2', 'tp_id'], 'integer'],
            [['tgl_beli', 'no_urut', 'tgl_potong'], 'safe'],
            [['berat'], 'number'],
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
        $query = KainDtl::find();

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
            'beli_id' => $this->beli_id,
            'kain_id' => $this->kain_id,
            'tgl_beli' => $this->tgl_beli,
            'berat' => $this->berat,
            'berat1' => $this->berat1,
            'berat2' => $this->berat2,
            'tgl_potong' => $this->tgl_potong,
            'tp_id' => $this->tp_id,
        ]);

        $query->andFilterWhere(['like', 'no_urut', $this->no_urut]);

        return $dataProvider;
    }
}
