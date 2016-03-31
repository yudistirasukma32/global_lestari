<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KondisiMotor;

/**
 * KondisiMotorSearch represents the model behind the search form about `app\models\KondisiMotor`.
 */
class KondisiMotorSearch extends KondisiMotor
{
    /**
     * @inheritdoc
     */

    public $no_totok;
    public $no_rangka;
    public $no_mesin;
    public $nama;

    public function rules()
    {
        return [
            [['id', 'id_motor'], 'integer'],
            [['kondisi','keterangan','no_totok','no_rangka','no_mesin','nama'], 'safe'],
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
        $query = KondisiMotor::find();
        $query->joinWith(['motor0','jenisMotor0']);
//        $query->where('status="belum terjual"');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['no_totok']=[
            'asc'=>['Motor.no_totok' => SORT_ASC],
            'desc'=>['Motor.no_totok'=> SORT_DESC],
        ];

        $dataProvider->sort->attributes['no_rangka']=[
            'asc'=>['Motor.no_rangka' => SORT_ASC],
            'desc'=>['Motor.no_rangka'=> SORT_DESC],
        ];

        $dataProvider->sort->attributes['no_mesin']=[
            'asc'=>['Motor.no_mesin' => SORT_ASC],
            'desc'=>['Motor.no_mesin'=> SORT_DESC],
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
            'no_totok'=> $this->no_totok,
            'no_rangka'=> $this->no_rangka,
            'no_mesin'=> $this->no_mesin,
            'nama'=> $this->nama,
        ]);

        $query->andFilterWhere(['like', 'kondisi', $this->kondisi])
        ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
