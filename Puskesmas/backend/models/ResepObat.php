<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resep_obat".
 *
 * @property int $id_resep
 * @property int $id_rekam_medik
 * @property string $nama_obat
 * @property string $dosis
 * @property string $status
 *
 * @property RekamMedik $rekamMedik
 * @property DetailResepObat $detailResep
 */
class ResepObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resep_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rekam_medik', 'nama_obat', 'dosis', 'status'], 'required'],
            [['id_rekam_medik'], 'integer'],
            [['nama_obat', 'dosis', 'status'], 'string', 'max' => 225],
            [['id_rekam_medik'], 'exist', 'skipOnError' => true, 'targetClass' => RekamMedik::className(), 'targetAttribute' => ['id_rekam_medik' => 'id_rekam_medik']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_resep' => 'Id Resep',
            'id_rekam_medik' => 'Id Rekam Medik',
            'nama_obat' => 'Nama Obat',
            'dosis' => 'Dosis',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRekamMedik()
    {
        return $this->hasOne(RekamMedik::className(), ['id_rekam_medik' => 'id_rekam_medik']);
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailResepObat()
    {
        return $this->hasOne(DetailResepObat::className(), ['id_resep_obat' => 'id_resep']);
    }
}
