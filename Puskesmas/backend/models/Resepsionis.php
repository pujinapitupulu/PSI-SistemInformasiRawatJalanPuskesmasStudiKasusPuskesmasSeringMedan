<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resepsionis".
 *
 * @property int $id_resepsionis
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property int $id_pendaftaran
 * @property int $id_antrian
 * @property int $nokk_pasien
 *
 * @property AntrianDanKeluhan $antrian
 * @property FamilyFolder $nokkPasien
 * @property PendaftaranPasien $pendaftaran
 */
class Resepsionis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resepsionis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jenis_kelamin', 'alamat', 'id_pendaftaran', 'id_antrian', 'nokk_pasien'], 'required'],
            [['id_pendaftaran', 'id_antrian', 'nokk_pasien'], 'integer'],
            [['nama', 'jenis_kelamin', 'alamat'], 'string', 'max' => 225],
            [['id_antrian'], 'exist', 'skipOnError' => true, 'targetClass' => AntrianDanKeluhan::className(), 'targetAttribute' => ['id_antrian' => 'id_antrian']],
            [['nokk_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => FamilyFolder::className(), 'targetAttribute' => ['nokk_pasien' => 'noKK_pasien']],
            [['id_pendaftaran'], 'exist', 'skipOnError' => true, 'targetClass' => PendaftaranPasien::className(), 'targetAttribute' => ['id_pendaftaran' => 'id_pendaftaran']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_resepsionis' => 'Id Resepsionis',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'id_pendaftaran' => 'Id Pendaftaran',
            'id_antrian' => 'Id Antrian',
            'nokk_pasien' => 'Nokk Pasien',
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
    public function getNokkPasien()
    {
        return $this->hasOne(FamilyFolder::className(), ['noKK_pasien' => 'nokk_pasien']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendaftaran()
    {
        return $this->hasOne(PendaftaranPasien::className(), ['id_pendaftaran' => 'id_pendaftaran']);
    }
}
