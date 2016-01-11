<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posisi_motor".
 *
 * @property integer $id
 * @property integer $id_motor
 * @property string $posisi
 * @property string $keterangan
 */

class PosisiMotor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posisi_motor';
    }

    public function getMotor0()
    {
        return $this->hasOne(Motor::className(), ['id' => 'id_motor'])->from(Motor::tableName());
    }

    public function getJenisMotor0()
    {
        return $this->hasOne(JenisMotor::className(), ['id' => 'id_jenis'])->with(['motor'])->from(JenisMotor::tableName());
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_motor', 'posisi'], 'required'],
            [['id_motor'], 'integer'],
            [['posisi', 'keterangan'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_motor' => 'Id Motor',
            'posisi' => 'Posisi',
            'keterangan' => 'Keterangan',
            'no_totok' => 'Nomor Totok',
            'no_rangka' => 'Nomor Rangka',
            'no_mesin' => 'Nomor Mesin',
            'jenisMotor0.nama' => 'Jenis Motor',
        ];
    }
}
