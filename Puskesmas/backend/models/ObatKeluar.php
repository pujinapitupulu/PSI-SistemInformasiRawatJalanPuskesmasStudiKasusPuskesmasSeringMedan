<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat_keluar".
 *
 * @property int $id_obat_keluar
 * @property int $id_apoteker
 * @property string $jenis_obat
 * @property string $tgl_keluar
 * @property int $jlh_obat_keluar
 * @property string $file
 *
 * @property Apoteker $obatKeluar
 */
class ObatKeluar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat_keluar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_apoteker',  'tgl_laporan', 'file'], 'required'],
            [['id_apoteker'], 'integer'],
            [['tgl_keluar'], 'safe'],
             [['file'], 'file'],
            [[ 'file'], 'string', 'max' => 225],
            [['id_obat_keluar'], 'exist', 'skipOnError' => true, 'targetClass' => Apoteker::className(), 'targetAttribute' => ['id_obat_keluar' => 'id_apoteker']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obat_keluar' => 'Id Obat Keluar',
            'id_apoteker' => 'Id Apoteker',
           
            'tgl_laporan' => 'Tanggal Laporan',
           
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObatKeluar()
    {
        return $this->hasOne(Apoteker::className(), ['id_apoteker' => 'id_obat_keluar']);
    }
}
