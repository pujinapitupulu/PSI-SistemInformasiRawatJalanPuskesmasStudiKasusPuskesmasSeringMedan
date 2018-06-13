<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dokter".
 *
 * @property int $id_dokter
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property int $id_lap_rm
 * @property int $id_resep
 * @property string $status
 *
 * @property LaporanRekamMedik $lapRm
 * @property Resep $resep
 */
class Dokter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jenis_kelamin', 'alamat', 'id_lap_rm', 'id_resep'], 'required'],
            [['id_lap_rm', 'id_resep'], 'integer'],
            [['nama', 'jenis_kelamin', 'alamat'], 'string', 'max' => 225],
            [['id_lap_rm'], 'exist', 'skipOnError' => true, 'targetClass' => LaporanRekamMedik::className(), 'targetAttribute' => ['id_lap_rm' => 'id_lap_rm']],
            [['id_resep'], 'exist', 'skipOnError' => true, 'targetClass' => ResepObat::className(), 'targetAttribute' => ['id_resep' => 'id_resep']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dokter' => 'Id Dokter',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'id_lap_rm' => 'Id Lap Rm',
            'id_resep' => 'Id Resep',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLapRm()
    {
        return $this->hasOne(LaporanRekamMedik::className(), ['id_lap_rm' => 'id_lap_rm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResep()
    {
        return $this->hasOne(Resep::className(), ['id_resep' => 'id_resep']);
    }
}
