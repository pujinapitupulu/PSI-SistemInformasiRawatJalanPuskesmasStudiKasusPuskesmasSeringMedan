<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailResepObat;

/**
 * DetailResepObatSearch represents the model behind the search form of `app\models\DetailResepObat`.
 */
class DetailResepObatSearch extends DetailResepObat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_detail_resep', 'id_resep_obat', 'id_obat'], 'integer'],
            [['dosis', 'cara_penggunaan'], 'safe'],
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
        $query = DetailResepObat::find();

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
            'id_detail_resep' => $this->id_detail_resep,
            'id_resep_obat' => $this->id_resep_obat,
            'id_obat' => $this->id_obat,
        ]);

        $query->andFilterWhere(['like', 'dosis', $this->dosis])
            ->andFilterWhere(['like', 'cara_penggunaan', $this->cara_penggunaan]);

        return $dataProvider;
    }
}
