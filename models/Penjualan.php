<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penjualan".
 *
 * @property integer $id
 * @property integer $id_motor
 * @property integer $id_pembeli
 * @property string $tgl
 * @property string $tipe_pembayaran
 * @property integer $harga
 * @property string $keterangan
 */
class Penjualan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penjualan';
    }

    public function getPembeli0()
    {
        return $this->hasOne(Pembeli::className(), ['id' => 'id_pembeli']);
    }

    public function getMotor0(){
        return $this->hasOne(Motor::className(), ['id' => 'id_motor']);
    }

    public function getJenisMotor0()
    {
        return $this->hasOne(JenisMotor::className(), ['id' => 'id_jenis'])->with(['motor']);
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_motor', 'id_pembeli', 'tgl', 'tipe_pembayaran', 'harga', 'keterangan'], 'required'],
            [['id_motor', 'id_pembeli', 'harga'], 'integer'],
            [['tgl'], 'safe'],
            [['tipe_pembayaran', 'keterangan'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id Penjualan',
            'id_motor' => 'Id Motor',
            'id_pembeli' => 'Id Pembeli',
            'tgl' => 'Tgl',
            'tipe_pembayaran' => 'Tipe Pembayaran',
            'harga' => 'Harga',
            'keterangan' => 'Keterangan',
            'nama' => 'Nama Pembeli',
            'jenisMotor0.nama' => 'Jenis Motor',
        ];
    }
}
