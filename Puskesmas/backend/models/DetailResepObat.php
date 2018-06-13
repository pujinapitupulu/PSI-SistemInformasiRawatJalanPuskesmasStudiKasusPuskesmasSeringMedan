<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_resep_obat".
 *
 * @property int $id_detail_resep
 * @property int $id_resep_obat
 * @property int $id_obat
 * @property string $dosis
 * @property string $cara_penggunaan
 *
 * @property Obat $obat
 * @property ResepObat $resepObat
 */
class DetailResepObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_resep_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_detail_resep', 'id_resep_obat', 'id_obat'], 'required'],
            [['id_detail_resep', 'id_resep_obat', 'id_obat'], 'integer'],
            [['cara_penggunaan'], 'string'],
            [['dosis'], 'string', 'max' => 200],
            [['id_detail_resep'], 'unique'],
            [['id_obat'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::className(), 'targetAttribute' => ['id_obat' => 'id_obat']],
            [['id_resep_obat'], 'exist', 'skipOnError' => true, 'targetClass' => ResepObat::className(), 'targetAttribute' => ['id_resep_obat' => 'id_resep']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detail_resep' => 'Id Detail Resep',
            'id_resep_obat' => 'Id Resep Obat',
            'id_obat' => 'Id Obat',
            'dosis' => 'Dosis',
            'cara_penggunaan' => 'Cara Penggunaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::className(), ['id_obat' => 'id_obat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResepObat()
    {
        return $this->hasOne(ResepObat::className(), ['id_resep' => 'id_resep_obat']);
    }
}
