<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permintaan_obat".
 *
 * @property int $id_permintaan
 * @property int $id_apoteker
 * @property string $nama_obat
 * @property string $jenis
 * @property int $jumlah
 * @property string $status
 */
class PermintaanObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'permintaan_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_apoteker', 'nama_obat', 'jenis', 'jumlah', 'status'], 'required'],
            [['id_apoteker', 'jumlah'], 'integer'],
            [['nama_obat', 'jenis', 'status'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_permintaan' => 'Id Permintaan',
            'id_apoteker' => 'Id Apoteker',
            'nama_obat' => 'Nama Obat',
            'jenis' => 'Jenis',
            'jumlah' => 'Jumlah',
            'status' => 'Status',
        ];
    }
}
