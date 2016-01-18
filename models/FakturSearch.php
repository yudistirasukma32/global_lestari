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
    public function rules()
    {
        return [
            [['id', 'id_penjualan'], 'integer'],
            [['nama_penerima', 'tgl', 'no_faktur', 'keterangan', 'foto'], 'safe'],
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
        $query->join('LEFT JOIN', 'pembeli', 'penjualan.id_pembeli = pembeli.id');
        $query->join('LEFT JOIN', 'motor', 'penjualan.id_motor = motor.id');
        $query->join('LEFT JOIN', 'jenis_motor', 'jenis_motor.id = motor.id_jenis');

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
            'asc'=>['pembeli.nama' => SORT_ASC],
            'desc'=>['pembeli.nama'=> SORT_DESC],
        ];

        $dataProvider->sort->attributes['Jenis Motor']=[
            'asc'=>['jenis_motor.nama' => SORT_ASC],
            'desc'=>['jenis_motor.nama'=> SORT_DESC],
        ];

        $query->andFilterWhere([
            'id' => $this->id,
            'id_penjualan' => $this->id_penjualan,
            'tgl' => $this->tgl,

        ]);

        $query->andFilterWhere(['like', 'nama_penerima', $this->nama_penerima])
            ->andFilterWhere(['like', 'no_faktur', $this->no_faktur])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
