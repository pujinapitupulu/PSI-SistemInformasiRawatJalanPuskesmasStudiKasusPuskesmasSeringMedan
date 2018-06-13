<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan_rekam_medik".
 *
 * @property int $id_laporan
 * @property int $id_Dokter
 * @property string $tgl_laporan
 * @property string $judul_laporan
 *
 * @property Dokter $dokter
 */
class LaporanRekamMedik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan_rekam_medik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_Dokter', 'tgl_laporan', 'judul_laporan'], 'required'],
            [['id_Dokter'], 'integer'],
            [['tgl_laporan'], 'safe'],
            [['judul_laporan'], 'string', 'max' => 225],
            [['id_Dokter'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::className(), 'targetAttribute' => ['id_Dokter' => 'id_dokter']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_laporan' => 'Id Laporan',
            'id_Dokter' => 'Id  Dokter',
            'tgl_laporan' => 'Tgl Laporan',
            'judul_laporan' => 'Judul Laporan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokter()
    {
        return $this->hasOne(Dokter::className(), ['id_dokter' => 'id_Dokter']);
    }
}
