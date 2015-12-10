<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Motor;

/**
 * MotorSearch represents the model behind the search form about `app\models\Motor`.
 */
class MotorSearch extends Motor
{
    /**
     * @inheritdoc
     */

    public $nama;

    public function rules()
    {
        return [
            [['id', 'id_jenis'], 'integer'],
            [['warna', 'no_totok', 'no_rangka', 'no_mesin', 'tahun', 'keterangan', 'status', 'nama'], 'safe'],
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
        $query = Motor::find();
        $query->joinWith(['jenisMotor0']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nama']=[
            'asc'=>['jenis_motor.nama' => SORT_ASC],
            'desc'=>['jenis_motor.nama'=> SORT_DESC],
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
            //'id_jenis' => $this->id_jenis,
        ]);

        $query->andFilterWhere(['like', 'warna', $this->warna])
            ->andFilterWhere(['like', 'no_totok', $this->no_totok])
            ->andFilterWhere(['like', 'no_rangka', $this->no_rangka])
            ->andFilterWhere(['like', 'no_mesin', $this->no_mesin])
            ->andFilterWhere(['like', 'tahun', $this->tahun])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
