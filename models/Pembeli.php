<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembeli".
 *
 * @property integer $id
 * @property string $nama
 * @property string $no_ktp
 * @property string $alamat
 * @property string $kota
 * @property string $no_tlp
 */
class Pembeli extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembeli';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_lengkap'], 'required'],
            [['nama_lengkap', 'kota'], 'string', 'max' => 50],
            [['no_ktp'], 'string', 'max' => 20],
            [['alamat'], 'string', 'max' => 100],
            [['no_tlp'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_lengkap' => 'Nama',
            'no_ktp' => 'No Ktp',
            'alamat' => 'Alamat',
            'kota' => 'Kota',
            'no_tlp' => 'No Tlp',
        ];
    }
}
