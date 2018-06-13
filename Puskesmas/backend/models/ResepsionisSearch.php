<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Resepsionis;

/**
 * ResepsionisSearch represents the model behind the search form of `app\models\Resepsionis`.
 */
class ResepsionisSearch extends Resepsionis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_resepsionis', 'id_pendaftaran', 'id_antrian', 'nokk_pasien'], 'integer'],
            [['nama', 'jenis_kelamin', 'alamat'], 'safe'],
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
        $query = Resepsionis::find();

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
            'id_resepsionis' => $this->id_resepsionis,
            'id_pendaftaran' => $this->id_pendaftaran,
            'id_antrian' => $this->id_antrian,
            'nokk_pasien' => $this->nokk_pasien,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'alamat', $this->alamat]);

        return $dataProvider;
    }
}
