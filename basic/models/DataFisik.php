<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_fisik".
 *
 * @property integer $id
 * @property integer $id_faktur
 * @property string $foto_ktp
 * @property string $foto_stnk
 * @property string $foto_bpkb
 * @property string $lainnya
 */
class DataFisik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_fisik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_faktur'], 'required'],
            [['id_faktur'], 'integer'],
            [['foto_ktp', 'foto_stnk', 'foto_bpkb', 'lainnya'], 'string', 'max' => 100],
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
            'foto_ktp' => 'Foto Ktp',
            'foto_stnk' => 'Foto Stnk',
            'foto_bpkb' => 'Foto Bpkb',
            'lainnya' => 'Lainnya',
        ];
    }
}
