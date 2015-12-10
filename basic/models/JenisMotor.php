<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_motor".
 *
 * @property integer $id
 * @property string $nama
 * @property string $keterangan
 */
class JenisMotor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_motor';
    }

    public function getMotor0()
    {
        return $this->hasMany(JenisMotor::className(), ['id' => 'id_jenis']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'keterangan' => 'Keterangan',
        ];
    }
}
