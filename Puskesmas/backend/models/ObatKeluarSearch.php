<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ObatKeluar;

/**
 * ObatKeluarSearch represents the model behind the search form of `app\models\ObatKeluar`.
 */
class ObatKeluarSearch extends ObatKeluar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_obat_keluar', 'id_apoteker'], 'integer'],
            [[ 'tgl_laporan', 'file'], 'safe'],
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
        $query = ObatKeluar::find();

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
            'id_obat_keluar' => $this->id_obat_keluar,
            'id_apoteker' => $this->id_apoteker,
            'tgl_laporan' => $this->tgl_laporan,
           
        ]);

        $query->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
