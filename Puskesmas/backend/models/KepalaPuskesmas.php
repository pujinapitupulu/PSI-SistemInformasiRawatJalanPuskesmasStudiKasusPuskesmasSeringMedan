<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kepala_puskesmas".
 *
 * @property int $id_kepala_puskesmas
 * @property string $nama
 * @property int $id
 * @property string $status
 *
 * @property User $id0
 */
class KepalaPuskesmas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kepala_puskesmas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kepala_puskesmas', 'nama', 'id', 'status'], 'required'],
            [['id_kepala_puskesmas', 'id'], 'integer'],
            [['nama', 'status'], 'string', 'max' => 225],
            [['id_kepala_puskesmas'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kepala_puskesmas' => 'Id Kepala Puskesmas',
            'nama' => 'Nama',
            'id' => 'ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
