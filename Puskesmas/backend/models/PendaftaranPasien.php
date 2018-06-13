<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendaftaran_pasien".
 *
 * @property int $id_pendaftaran
 * @property int $id_resepsionis
 * @property int $noKK_pasien
 * @property string $nama_pasien
 * @property string $jenis_kelamin
 * @property string $tgl_lahir
 * @property string $alamat
 * @property int $no_telepon
 * @property string $pekerjaan
 *
 * @property Resepsionis $resepsionis
 */
class PendaftaranPasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendaftaran_pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_resepsionis', 'noKK_pasien', 'nama_pasien', 'jenis_kelamin', 'tgl_lahir', 'alamat', 'no_telepon', 'pekerjaan'], 'required'],
            [['id_resepsionis', 'noKK_pasien', 'no_telepon'], 'integer'],
            [['tgl_lahir'], 'safe'],
            [['nama_pasien', 'jenis_kelamin', 'alamat', 'pekerjaan'], 'string', 'max' => 225],
            [['id_resepsionis'], 'exist', 'skipOnError' => true, 'targetClass' => Resepsionis::className(), 'targetAttribute' => ['id_resepsionis' => 'id_resepsionis']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pasien' => 'Id Pasien',
            'id_resepsionis' => 'Id Resepsionis',
            'noKK_pasien' => 'No Kk Pasien',
            'nama_pasien' => 'Nama Pasien',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tgl_lahir' => 'Tgl Lahir',
            'alamat' => 'Alamat',
            'no_telepon' => 'No Telepon',
            'pekerjaan' => 'Pekerjaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResepsionis()
    {
        return $this->hasOne(Resepsionis::className(), ['id_resepsionis' => 'id_resepsionis']);
    }
}
