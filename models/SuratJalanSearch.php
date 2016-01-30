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
    public $no_faktur;
    public function rules()
    {
        return [
            [['id', 'id_faktur'], 'integer'],
            [['alamat_pengiriman', 'tgl_pengiriman', 'nama_penerima', 'nama_pengirim', 'keterangan', 'foto','no_faktur'], 'safe'],
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
        $query->joinWith(['faktur0']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['no_faktur']=[
            'asc'=>['faktur.no_faktur' => SORT_ASC],
            'desc'=>['faktur.no_faktur'=> SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_faktur' => $this->id_faktur,
            //'faktur0.no_faktur' => $this->no_faktur,
            //'tgl_pengiriman' => $this->tgl_pengiriman,
        ]);

        $query->andFilterWhere(['like', 'alamat_pengiriman', $this->alamat_pengiriman])
            ->andFilterWhere(['like', 'nama_penerima', $this->nama_penerima])
            ->andFilterWhere(['like', 'nama_pengirim', $this->nama_pengirim])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'tgl_pengiriman', $this->tgl_pengiriman])
            ->andFilterWhere(['like', 'no_faktur', $this->no_faktur])
            ->andFilterWhere(['like', 'foto', $this->foto]);


        return $dataProvider;
    }
}
