<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratJalan;

/**
 * SuratJalanSearch represents the model behind the search form about `app\models\SuratJalan`.
 */
class SuratJalanSearch extends SuratJalan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_penjualan'], 'integer'],
            [['alamat_pengiriman', 'tgl_pengiriman', 'nama_penerima', 'nama_pengirim', 'keterangan'], 'safe'],
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
        $query = SuratJalan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_penjualan' => $this->id_penjualan,
            'tgl_pengiriman' => $this->tgl_pengiriman,
        ]);

        $query->andFilterWhere(['like', 'alamat_pengiriman', $this->alamat_pengiriman])
            ->andFilterWhere(['like', 'nama_penerima', $this->nama_penerima])
            ->andFilterWhere(['like', 'nama_pengirim', $this->nama_pengirim])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
