<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apoteker".
 *
 * @property int $id_apoteker
 * @property string $nama
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property int $id_ok
 * @property int $id_om
 *
 * @property ObatKeluar $ok
 * @property ObatMasuk $om
 */
class Apoteker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apoteker';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'jenis_kelamin', 'alamat', 'id_ok', 'id_om'], 'required'],
            [['id_ok', 'id_om'], 'integer'],
            [['nama', 'jenis_kelamin', 'alamat'], 'string', 'max' => 255],
            [['id_ok'], 'exist', 'skipOnError' => true, 'targetClass' => ObatKeluar::className(), 'targetAttribute' => ['id_ok' => 'id_ok']],
            [['id_om'], 'exist', 'skipOnError' => true, 'targetClass' => ObatMasuk::className(), 'targetAttribute' => ['id_om' => 'id_om']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_apoteker' => 'Id Apoteker',
            'nama' => 'Nama',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'id_ok' => 'Id Ok',
            'id_om' => 'Id Om',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOk()
    {
        return $this->hasOne(ObatKeluar::className(), ['id_ok' => 'id_ok']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOm()
    {
        return $this->hasOne(ObatMasuk::className(), ['id_om' => 'id_om']);
    }
}
