<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rekam_medik".
 *
 * @property int $id_rekam_medik
 * @property int $id_pasien
 * @property int $id_dokter
 * @property int $id_antrian
 * @property string $tgl_rekam_medik
 * @property string $keluhan_pasien
 * @property string $diagnosa
 * @property string $jenis_penyakit_pasien
 * @property int $umur
 *
 * @property AntrianDanKeluhan $antrian
 * @property Dokter $dokter
 * @property PendaftaranPasien $pasien
 * @property ResepObat[] $resepObats
 */
class RekamMedik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rekam_medik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'id_dokter', 'id_antrian', 'tgl_rekam_medik', 'keluhan_pasien', 'diagnosa', 'jenis_penyakit_pasien'], 'required'],
            [['id_pasien', 'id_dokter', 'id_antrian', 'umur'], 'integer'],
            [['tgl_rekam_medik'], 'safe'],
            [['keluhan_pasien', 'diagnosa', 'jenis_penyakit_pasien'], 'string', 'max' => 225],
            [['id_antrian'], 'exist', 'skipOnError' => true, 'targetClass' => AntrianDanKeluhan::className(), 'targetAttribute' => ['id_antrian' => 'id_antrian']],
            [['id_dokter'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::className(), 'targetAttribute' => ['id_dokter' => 'id_dokter']],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => PendaftaranPasien::className(), 'targetAttribute' => ['id_pasien' => 'id_pasien']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rekam_medik' => 'Id Rekam Medik',
            'id_pasien' => 'Id Pasien',
            'id_dokter' => 'Id Dokter',
            'id_antrian' => 'Id Antrian',
            'tgl_rekam_medik' => 'Tgl Rekam Medik',
            'keluhan_pasien' => 'Keluhan Pasien',
            'diagnosa' => 'Diagnosa',
            'jenis_penyakit_pasien' => 'Jenis Penyakit Pasien',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntrian()
    {
        return $this->hasOne(AntrianDanKeluhan::className(), ['id_antrian' => 'id_antrian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokter()
    {
        return $this->hasOne(Dokter::className(), ['id_dokter' => 'id_dokter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(PendaftaranPasien::className(), ['id_pasien' => 'id_pasien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResepObats()
    {
        return $this->hasMany(ResepObat::className(), ['id_rekam_medik' => 'id_rekam_medik']);
    }
}
