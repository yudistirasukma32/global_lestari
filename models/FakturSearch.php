<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Faktur;

/**
 * FakturSearch represents the model behind the search form about `app\models\Faktur`.
 */
class FakturSearch extends Faktur
{
    /**
     * @inheritdoc
     */
    public $nama;
    public $nama_lengkap;

    public function rules()
    {
        return [
            [['id', 'id_penjualan'], 'integer'],
            [['nama_penerima', 'tgl_faktur', 'no_faktur', 'keterangan', 'foto', 'nama','nama_lengkap'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Faktur::find();
        $query->joinWith(['penjualan0']);
        $query->join('INNER JOIN', 'pembeli', 'penjualan.id_pembeli = pembeli.id');
        $query->join('INNER JOIN', 'motor', 'penjualan.id_motor = motor.id');
        $query->join('INNER JOIN', 'jenis_motor', 'jenis_motor.id = motor.id_jenis');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider->sort->attributes['Tgl Penjualan']=[
            'asc'=>['penjualan.tgl' => SORT_ASC],
            'desc'=>['penjualan.tgl'=> SORT_DESC],
        ];

        $dataProvider->sort->attributes['Nama Pembeli']=[
            'asc'=>['pembeli.nama_lengkap' => SORT_ASC],
            'desc'=>['pembeli.nama_lengkap'=> SORT_DESC],
        ];

        $dataProvider->sort->attributes['jenisMotor0.nama']=[
            'asc'=>['motor.id_jenis' => SORT_ASC],
            'desc'=>['motor.id_jenis'=> SORT_DESC],
        ];

        $query->andFilterWhere([
            'id' => $this->id,
            'id_penjualan' => $this->id_penjualan,
        ]);

        $query->andFilterWhere(['like', 'nama_penerima', $this->nama_penerima])
            ->andFilterWhere(['like', 'no_faktur', $this->no_faktur])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'tgl_faktur', $this->tgl_faktur])
            ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
