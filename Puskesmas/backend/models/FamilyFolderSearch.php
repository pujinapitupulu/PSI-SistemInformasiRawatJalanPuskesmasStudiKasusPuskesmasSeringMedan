<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FamilyFolder;

/**
 * FamilyFolderSearch represents the model behind the search form of `app\models\FamilyFolder`.
 */
class FamilyFolderSearch extends FamilyFolder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['noKK'], 'integer'],
            [['nama_kepala_keluarga', 'alamat'], 'safe'],
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
        $query = FamilyFolder::find();

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
            'noKK' => $this->noKK,
        ]);

        $query->andFilterWhere(['like', 'nama_kepala_keluarga', $this->nama_kepala_keluarga])
            ->andFilterWhere(['like', 'alamat', $this->alamat]);

        return $dataProvider;
    }
}
