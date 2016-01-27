<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_jalan".
 *
 * @property integer $id
 * @property integer $id_faktur
 * @property string $alamat_pengiriman
 * @property string $tgl_pengiriman
 * @property string $nama_penerima
 * @property string $nama_pengirim
 * @property string $keterangan
 * @property string $foto
 *
 * @property Faktur $idFaktur
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
    public function rules()
    {
        return [
            [['id_faktur', 'alamat_pengiriman', 'tgl_pengiriman', 'nama_penerima', 'nama_pengirim'], 'required'],
            [['id_faktur'], 'integer'],
            [['tgl_pengiriman'], 'safe'],
            [['keterangan'], 'string'],
            [['alamat_pengiriman'], 'string', 'max' => 100],
            [['nama_penerima', 'nama_pengirim'], 'string', 'max' => 50],
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
            'id_faktur' => 'Id Faktur',
            'alamat_pengiriman' => 'Alamat Pengiriman',
            'tgl_pengiriman' => 'Tgl Pengiriman',
            'nama_penerima' => 'Nama Penerima',
            'nama_pengirim' => 'Nama Pengirim',
            'keterangan' => 'Keterangan',
            'foto' => 'Foto',
            'no_faktur' => 'No Faktur'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getFaktur0()
    {
        return $this->hasOne(Faktur::className(), ['id' => 'id_faktur']);
    }
}
