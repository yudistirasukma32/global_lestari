<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faktur".
 *
 * @property integer $id
 * @property integer $id_penjualan
 * @property string $nama_penerima
 * @property string $tgl_faktur
 * @property string $no_faktur
 * @property string $keterangan
 * @property string $foto
 *
 * @property Penjualan $idPenjualan
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
            [['id_penjualan', 'nama_penerima', 'tgl_faktur', 'no_faktur'], 'required'],
            [['id_penjualan'], 'integer'],
            [['tgl_faktur'], 'safe'],
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
            'tgl_faktur' => 'Tgl Faktur',
            'no_faktur' => 'No Faktur',
            'keterangan' => 'Keterangan',
            'foto' => 'Foto',
            'nama' => 'Nama Pembeli',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualan0()
    {
        return $this->hasOne(Penjualan::className(), ['id' => 'id_penjualan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratJalans()
    {
        return $this->hasMany(SuratJalan::className(), ['id_faktur' => 'id']);
    }
}
