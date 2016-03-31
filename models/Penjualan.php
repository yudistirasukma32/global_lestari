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
 * @property string $foto_nota
 * @property string $foto_ktp
 *
 * @property Faktur[] $fakturs
 * @property Motor $idMotor
 * @property Pembeli $idPembeli
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
        return $this->hasOne(JenisMotor::className(), ['id' => 'id_jenis'])->via('motor0');
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
            [['foto_nota'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['foto_ktp'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
            'id_pembeli' => 'Id Pembeli',
            'tgl' => 'Tgl',
            'tipe_pembayaran' => 'Tipe Pembayaran',
            'harga' => 'Harga',
            'keterangan' => 'Keterangan',
            'foto_nota' => 'Foto Nota',
            'foto_ktp' => 'Foto Ktp',
            'jenisMotor0.nama' => 'Jenis Motor',
            'pembeli0.nama_lengkap' => 'Nama Lengkap',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFakturs()
    {
        return $this->hasMany(Faktur::className(), ['id_penjualan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

}
