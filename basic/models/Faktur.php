<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faktur".
 *
 * @property integer $id
 * @property integer $id_surat_jalan
 * @property string $nama_penerima
 * @property string $tgl
 * @property string $no_faktur
 * @property string $keterangan
 *
 * @property SuratJalan $idSuratJalan
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
            [['id_surat_jalan', 'nama_penerima', 'tgl', 'no_faktur'], 'required'],
            [['id_surat_jalan'], 'integer'],
            [['tgl'], 'safe'],
            [['keterangan'], 'string'],
            [['nama_penerima'], 'string', 'max' => 50],
            [['no_faktur'], 'string', 'max' => 20],
            [['id_surat_jalan'], 'exist', 'skipOnError' => true, 'targetClass' => SuratJalan::className(), 'targetAttribute' => ['id_surat_jalan' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_surat_jalan' => 'Id Surat Jalan',
            'nama_penerima' => 'Nama Penerima',
            'tgl' => 'Tgl',
            'no_faktur' => 'No Faktur',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSuratJalan()
    {
        return $this->hasOne(SuratJalan::className(), ['id' => 'id_surat_jalan']);
    }
}
