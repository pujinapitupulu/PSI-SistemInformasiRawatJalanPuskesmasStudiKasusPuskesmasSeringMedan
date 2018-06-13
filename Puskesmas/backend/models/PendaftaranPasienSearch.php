<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PendaftaranPasien;

/**
 * PendaftaranPasienSearch represents the model behind the search form of `app\models\PendaftaranPasien`.
 */
class PendaftaranPasienSearch extends PendaftaranPasien
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'id_resepsionis', 'noKK_pasien', 'no_telepon'], 'integer'],
            [['nama_pasien', 'jenis_kelamin', 'tgl_lahir', 'alamat', 'pekerjaan'], 'safe'],
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
        $query = PendaftaranPasien::find();

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
            'id_pasien' => $this->id_pasien,
            'id_resepsionis' => $this->id_resepsionis,
            'noKK_pasien' => $this->noKK_pasien,
            'tgl_lahir' => $this->tgl_lahir,
            'no_telepon' => $this->no_telepon,
        ]);

        $query->andFilterWhere(['like', 'nama_pasien', $this->nama_pasien])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan]);

        return $dataProvider;
    }
}
