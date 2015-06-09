<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Proses;

/**
 * ProsesSearch represents the model behind the search form about `frontend\models\Proses`.
 */
class ProsesSearch extends Proses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jadi_id', 'tugas_id', 'urutan', 'borong'], 'integer'],
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
        $query = Proses::find();

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
            'jadi_id' => $this->jadi_id,
            'tugas_id' => $this->tugas_id,
            'urutan' => $this->urutan,
            'borong' => $this->borong,
        ]);

        return $dataProvider;
    }
}
