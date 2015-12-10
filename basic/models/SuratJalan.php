<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "surat_jalan".
 *
 * @property integer $id
 * @property integer $id_penjualan
 * @property string $alamat_pengiriman
 * @property string $tgl_pengiriman
 * @property string $nama_penerima
 * @property string $nama_pengirim
 * @property string $keterangan
 */
class SuratJalan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surat_jalan';
    }

    /**
     * @inheritdoc
     */

    public function getMotor0()
    {
        return $this->hasOne(Motor::className(), ['id' => 'id_motor']);
    }

    public function getPenjualan0()
    {
        return $this->hasOne(Motor::className(), ['id' => 'id_penjualan']);
    }

    /**
     * @return array
     */

    public function rules()
    {
        return [
            [['id_penjualan', 'alamat_pengiriman', 'tgl_pengiriman', 'nama_penerima', 'nama_pengirim'], 'required'],
            [['id_penjualan'], 'integer'],
            [['tgl_pengiriman'], 'safe'],
            [['keterangan'], 'string'],
            [['alamat_pengiriman'], 'string', 'max' => 100],
            [['nama_penerima', 'nama_pengirim'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id Surat Jalan',
            'id_penjualan' => 'Id Penjualan',
            'alamat_pengiriman' => 'Alamat Pengiriman',
            'tgl_pengiriman' => 'Tgl Pengiriman',
            'nama_penerima' => 'Nama Penerima',
            'nama_pengirim' => 'Nama Pengirim',
            'keterangan' => 'Keterangan',
        ];
    }
}
