<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ResepObat;

/**
 * ResepObatSearch represents the model behind the search form of `app\models\ResepObat`.
 */
class ResepObatSearch extends ResepObat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_resep', 'id_rekam_medik'], 'integer'],
            [['nama_obat', 'dosis', 'status'], 'safe'],
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
        $query = ResepObat::find();

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
            'id_resep' => $this->id_resep,
            'id_rekam_medik' => $this->id_rekam_medik,
        ]);

        $query->andFilterWhere(['like', 'nama_obat', $this->nama_obat])
            ->andFilterWhere(['like', 'dosis', $this->dosis])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
