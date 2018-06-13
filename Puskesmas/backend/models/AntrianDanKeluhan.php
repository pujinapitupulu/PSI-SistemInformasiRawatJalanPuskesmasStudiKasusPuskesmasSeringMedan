<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "antrian_dan_keluhan".
 *
 * @property int $id_antrian
 * @property int $id_pasien
 * @property int $tgl_antrian
 * @property int $tinggi_badan_pasien
 * @property int $berat_badan_pasien
 * @property int $tekanan_darah_pasien
 * @property string $keluhan_pasien
 * @property string $status
 * @property string $nama_pasien
 * @property int $id_dokter
 *
 * @property PendaftaranPasien $pasien
* @property Dokter $dokter
 * @property RekamMedik[] $rekamMediks
 */
class AntrianDanKeluhan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'antrian_dan_keluhan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'tgl_antrian', 'tinggi_badan_pasien', 'berat_badan_pasien', 'tekanan_darah_pasien', 'keluhan_pasien', 'status', 'id_dokter'], 'required'],
            [['id_pasien', 'tinggi_badan_pasien', 'berat_badan_pasien', 'tekanan_darah_pasien', 'id_dokter'], 'integer'],
             [['tgl_antrian'], 'safe'],
            [['keluhan_pasien', 'status'], 'string', 'max' => 225],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => PendaftaranPasien::className(), 'targetAttribute' => ['id_pasien' => 'id_pasien']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_antrian' => 'Id Antrian',
            'id_pasien' => 'Id Pasien',
            'tgl_antrian' => 'Tgl Antrian',
            'tinggi_badan_pasien' => 'Tinggi Badan Pasien',
            'berat_badan_pasien' => 'Berat Badan Pasien',
            'tekanan_darah_pasien' => 'Tekanan Darah Pasien',
            'keluhan_pasien' => 'Keluhan Pasien',
            'status' => 'Status',
        ];
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
    public function getDokter()
    {
        return $this->hasOne(Dokter::className(), ['id_dokter' => 'id_dokter']);
    }

//     public function getPasienName() {
//         return $this->$pasien->nama_pasien;
// }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRekamMediks()
    {
        return $this->hasMany(RekamMedik::className(), ['id_antrian' => 'id_antrian']);
    }
}
