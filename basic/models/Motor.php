<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "motor".
 *
 * @property integer $id
 * @property string $warna
 * @property string $no_totok
 * @property string $no_rangka
 * @property string $no_mesin
 * @property string $tahun
 * @property string $keterangan
 * @property integer $id_jenis
 * @property string $status
 */
class Motor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'motor';
    }

    public function getJenisMotor0()
    {
        return $this->hasOne(JenisMotor::className(), ['id' => 'id_jenis']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warna', 'no_totok', 'no_rangka', 'no_mesin', 'tahun', 'id_jenis'], 'required'],
            [['id_jenis'], 'integer'],
            [['status'], 'string'],
            [['warna'], 'string', 'max' => 15],
            [['no_totok', 'no_rangka', 'no_mesin'], 'string', 'max' => 20],
            [['tahun'], 'string', 'max' => 4],
            [['keterangan'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Motor',
            'warna' => 'Warna',
            'no_totok' => 'No Totok',
            'no_rangka' => 'No Rangka',
            'no_mesin' => 'No Mesin',
            'tahun' => 'Tahun',
            'keterangan' => 'Keterangan',
            'id_jenis' => 'Id Jenis',
            'status' => 'Status',
            'nama' => 'Jenis Motor'
        ];
    }
}
