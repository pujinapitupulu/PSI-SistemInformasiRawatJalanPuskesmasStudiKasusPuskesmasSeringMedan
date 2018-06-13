<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property string $id_obat
 * @property int $id_apoteker
 * @property string $nama_obat
 * @property string $jenis_obat
 * @property int $jumlah_obat
 *
 * @property Apoteker $apoteker
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_apoteker', 'nama_obat', 'jenis_obat', 'jumlah_obat'], 'required'],
            [['id_apoteker', 'jumlah_obat'], 'integer'],
            [['nama_obat', 'jenis_obat'], 'string', 'max' => 225],
            [['id_apoteker'], 'exist', 'skipOnError' => true, 'targetClass' => Apoteker::className(), 'targetAttribute' => ['id_apoteker' => 'id_apoteker']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obat' => 'Id Obat',
            'id_apoteker' => 'Id Apoteker',
            'nama_obat' => 'Nama Obat',
            'jenis_obat' => 'Jenis Obat',
            'jumlah_obat' => 'Jumlah Obat',
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
