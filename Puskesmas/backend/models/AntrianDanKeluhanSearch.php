<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AntrianDanKeluhan;

/**
 * AntrianDanKeluhanSearch represents the model behind the search form of `app\models\AntrianDanKeluhan`.
 */
class AntrianDanKeluhanSearch extends AntrianDanKeluhan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_antrian', 'id_pasien', 'tgl_antrian', 'tinggi_badan_pasien', 'berat_badan_pasien', 'tekanan_darah_pasien', 'id_dokter'], 'integer'],
            [['keluhan_pasien', 'status'], 'safe'],
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
        $query = AntrianDanKeluhan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        // $this->load($params);

        // if (!$this->validate()) {
        //     // uncomment the following line if you do not want to return any records when validation fails
        //     // $query->where('0=1');
        //     return $dataProvider;
        // }

        if (isset($_GET['AntrianDanKeluhanSearch']) && !($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_antrian' => $this->id_antrian,
            'id_pasien' => $this->id_pasien,
            'tgl_antrian' => $this->tgl_antrian,
            'tinggi_badan_pasien' => $this->tinggi_badan_pasien,
            'berat_badan_pasien' => $this->berat_badan_pasien,
            'tekanan_darah_pasien' => $this->tekanan_darah_pasien,
            'id_dokter' => $this->id_dokter, 
        ]);

        $query->andFilterWhere(['like', 'keluhan_pasien', $this->keluhan_pasien])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
