<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DataFisik;

/**
 * DataFisikSearch represents the model behind the search form about `app\models\DataFisik`.
 */
class DataFisikSearch extends DataFisik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_faktur'], 'integer'],
            [['foto_ktp', 'foto_stnk', 'foto_bpkb', 'lainnya'], 'safe'],
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
        $query = DataFisik::find();

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
            'id_faktur' => $this->id_faktur,
        ]);

        $query->andFilterWhere(['like', 'foto_ktp', $this->foto_ktp])
            ->andFilterWhere(['like', 'foto_stnk', $this->foto_stnk])
            ->andFilterWhere(['like', 'foto_bpkb', $this->foto_bpkb])
            ->andFilterWhere(['like', 'lainnya', $this->lainnya]);

        return $dataProvider;
    }
}
