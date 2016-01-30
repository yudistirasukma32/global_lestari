<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penjualan;

/**
 * PenjualanSearch represents the model behind the search form about `app\models\Penjualan`.
 */
class PenjualanSearch extends Penjualan
{
    /**
     * @inheritdoc
     */

    public $nama;

    public function rules()
    {
        return [
            [['id', 'id_motor', 'id_pembeli', 'harga'], 'integer'],
            [['tgl', 'tipe_pembayaran', 'nama', 'keterangan'], 'safe'],
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

        $query = Penjualan::find();
        $query->joinWith(['pembeli0']);
        $query->joinWith(['motor0']);
        $query->join('LEFT JOIN', 'jenis_motor', 'jenis_motor.id = motor.id_jenis');

        // add conditions that should always apply here
        //var_dump($sql);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nama']=[
            'asc'=>['Pembeli.nama' => SORT_ASC],
            'desc'=>['Pembeli.nama'=> SORT_DESC],
        ];

        $dataProvider->sort->attributes['jenisMotor0.nama']=[
            'asc'=>['motor.id_jenis' => SORT_ASC],
            'desc'=>['motor.id_jenis'=> SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_motor' => $this->id_motor,
            //'id_pembeli' => $this->id_pembeli,
            'tgl' => $this->tgl,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'tipe_pembayaran', $this->tipe_pembayaran])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);
            //->andFilterWhere(['like', 'nama', $this->motor0->jenisMotor0->nama]);
            //->andFilterWhere(['like', 'id_jenis', $this->jenisMotor0.nama]);

        return $dataProvider;
    }
}
