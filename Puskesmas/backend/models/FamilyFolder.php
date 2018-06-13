<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "family_folder".
 *
 * @property int $noKK
 * @property string $nama_kepala_keluarga
 * @property string $alamat
 */
class FamilyFolder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'family_folder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['noKK', 'nama_kepala_keluarga', 'alamat'], 'required'],
            [['noKK'], 'integer'],
            [['nama_kepala_keluarga', 'alamat'], 'string', 'max' => 225],
            [['noKK'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'noKK' => 'No KK',
            'nama_kepala_keluarga' => 'Nama Kepala Keluarga',
            'alamat' => 'Alamat',
        ];
    }
}
