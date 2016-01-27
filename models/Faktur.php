<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faktur".
 *
 * @property integer $id
 * @property integer $id_penjualan
 * @property string $nama_penerima
 * @property string $tgl
 * @property string $no_faktur
 * @property string $keterangan
 * @property string $foto
 *
 * @property Faktur $idPenjualan
 * @property Faktur[] $fakturs
 * @property SuratJalan[] $suratJalans
 */
class Faktur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faktur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_penjualan', 'nama_penerima', 'tgl', 'no_faktur'], 'required'],
            [['id_penjualan'], 'integer'],
            [['tgl'], 'safe'],
            [['keterangan'], 'string'],
            [['nama_penerima', 'no_faktur'], 'string', 'max' => 50],
            [['foto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_penjualan' => 'Id Penjualan',
            'nama_penerima' => 'Nama Penerima',
            'tgl' => 'Tgl',
            'no_faktur' => 'No Faktur',
            'keterangan' => 'Keterangan',
            'foto' => 'Foto',
            'penjualan0.tgl' => 'Tgl Penjualan',
            'nama' => 'Jenis Motor'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualan0()
    {
        return $this->hasOne(Penjualan::className(), ['id' => 'id_penjualan']);
    }

    public function getPembeli0()
    {
        return $this->hasOne(Pembeli::className(), ['id' => 'id_pembeli'])->with(['penjualan']);
    }

    public function getMotor0(){
        return $this->hasOne(Motor::className(), ['id' => 'id_motor'])->with(['penjualan']);
    }

    public function getJenisMotor0()
    {
        return $this->hasOne(JenisMotor::className(), ['id' => 'id_jenis'])->with(['motor']);
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
    public function getSuratJalans()
    {
        return $this->hasMany(SuratJalan::className(), ['id_faktur' => 'id']);
    }
}
