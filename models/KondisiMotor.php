<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kondisi_motor".
 *
 * @property integer $id
 * @property integer $id_motor
 * @property string $kondisi
 * @property integer $keterangan
 */
class KondisiMotor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kondisi_motor';
    }

    /**
     * @inheritdoc
     */
    public function getMotor0()
    {
        return $this->hasOne(Motor::className(), ['id' => 'id_motor']);
    }

    public function getJenisMotor0()
    {
        return $this->hasOne(JenisMotor::className(), ['id' => 'id_jenis'])->with(['motor']);
    }

    public function rules()
    {
        return [
            [['id_motor', 'kondisi'], 'required'],
            [['id_motor'], 'integer'],
            [['kondisi','keterangan'], 'string'],
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
            'kondisi' => 'Kondisi',
            'keterangan' => 'Keterangan',
            'no_totok' => 'Nomor Totok',
            'no_rangka' => 'Nomor Rangka',
            'no_mesin' => 'Nomor Mesin',
            'jenisMotor0.nama' => 'Jenis Motor',
        ];
    }
}
