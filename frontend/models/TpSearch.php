<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Tp;

/**
 * TpSearch represents the model behind the search form about `frontend\models\Tp`.
 */
class TpSearch extends Tp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'roll', 'kain_id', 'potongan', 'pot_dzn', 'pot_pcs', 'sablon', 'sab_dzn', 'sab_pcs'], 'integer'],
            [['no_tp', 'tgl_potong'], 'safe'],
            [['total_berat', 'prosentase'], 'number'],
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
        $query = Tp::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'tgl_potong' => $this->tgl_potong,
            'roll' => $this->roll,
            'kain_id' => $this->kain_id,
            'total_berat' => $this->total_berat,
            'potongan' => $this->potongan,
            'pot_dzn' => $this->pot_dzn,
            'pot_pcs' => $this->pot_pcs,
            'prosentase' => $this->prosentase,
            'sablon' => $this->sablon,
            'sab_dzn' => $this->sab_dzn,
            'sab_pcs' => $this->sab_pcs,
        ]);

        $query->andFilterWhere(['like', 'no_tp', $this->no_tp]);

        return $dataProvider;
    }
}
