<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PermintaanObat;

/**
 * PermintaanObatSearch represents the model behind the search form of `app\models\PermintaanObat`.
 */
class PermintaanObatSearch extends PermintaanObat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_permintaan', 'id_apoteker', 'jumlah'], 'integer'],
            [['nama_obat', 'jenis', 'status'], 'safe'],
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
        $query = PermintaanObat::find();

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
            'id_permintaan' => $this->id_permintaan,
            'id_apoteker' => $this->id_apoteker,
            'jumlah' => $this->jumlah,
        ]);

        $query->andFilterWhere(['like', 'nama_obat', $this->nama_obat])
            ->andFilterWhere(['like', 'jenis', $this->jenis])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
