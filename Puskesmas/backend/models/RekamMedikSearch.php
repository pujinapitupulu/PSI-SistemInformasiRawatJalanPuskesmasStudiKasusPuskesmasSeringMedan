<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RekamMedik;

/**
 * RekamMedikSearch represents the model behind the search form of `app\models\RekamMedik`.
 */
class RekamMedikSearch extends RekamMedik
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rekam_medik', 'id_pasien', 'id_dokter', 'id_antrian','umur'], 'integer'],
            [['tgl_rekam_medik', 'keluhan_pasien', 'diagnosa', 'jenis_penyakit_pasien'], 'safe'],
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
        $query = RekamMedik::find();

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
            'id_rekam_medik' => $this->id_rekam_medik,
            'id_pasien' => $this->id_pasien,
            'id_dokter' => $this->id_dokter,
            'id_antrian' => $this->id_antrian,
            'tgl_rekam_medik' => $this->tgl_rekam_medik,
            'umur' => $this->umur,
        ]);

        $query->andFilterWhere(['like', 'keluhan_pasien', $this->keluhan_pasien])
            ->andFilterWhere(['like', 'diagnosa', $this->diagnosa])
            ->andFilterWhere(['like', 'jenis_penyakit_pasien', $this->jenis_penyakit_pasien]);

        return $dataProvider;
    }

    public function searchByPasienId($params,$id_pasien)
    {
        $query = RekamMedik::find()->where(['id_pasien' =>$id_pasien]);

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
            'id_rekam_medik' => $this->id_rekam_medik,
            'id_pasien' => $this->id_pasien,
            'id_dokter' => $this->id_dokter,
            'id_antrian' => $this->id_antrian,
            'tgl_rekam_medik' => $this->tgl_rekam_medik,
        ]);

        $query->andFilterWhere(['like', 'keluhan_pasien', $this->keluhan_pasien])
            ->andFilterWhere(['like', 'diagnosa', $this->diagnosa])
            ->andFilterWhere(['like', 'jenis_penyakit_pasien', $this->jenis_penyakit_pasien]);

        return $dataProvider;
    }
}
