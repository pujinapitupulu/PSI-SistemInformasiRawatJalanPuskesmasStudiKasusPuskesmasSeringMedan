<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat_masuk".
 *
 * @property int $id_obat_masuk
 * @property int $id_apoteker
 * @property string $jenis_obat
 * @property string $tgl_masuk
 * @property int $jumlah_obat_masuk
 * @property string $file
 *
 * @property Apoteker $apoteker
 */
class ObatMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat_masuk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_apoteker', 'tgl_laporan', 'file'], 'required'],
            [['id_apoteker'], 'integer'],
            [['tgl_masuk'], 'safe'],
             [['file'], 'file'],
            [[ 'file'], 'string', 'max' => 225],
            [['id_apoteker'], 'exist', 'skipOnError' => true, 'targetClass' => Apoteker::className(), 'targetAttribute' => ['id_apoteker' => 'id_apoteker']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obat_masuk' => 'Id Obat Masuk',
            'id_apoteker' => 'Id Apoteker',
            'tgl_laporan' => 'Tanggal laporan',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApoteker()
    {
        return $this->hasOne(Apoteker::className(), ['id_apoteker' => 'id_apoteker']);
    }
}
