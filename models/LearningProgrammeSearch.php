<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LearningProgramme;

/**
 * LearningProgrammeSearch represents the model behind the search form of `app\models\LearningProgramme`.
 */
class LearningProgrammeSearch extends LearningProgramme
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'university',  'ZQF_level', 'prog_expert1', 'prog_expert2', 'prog_expert3', 'prog_expert4', 'created_by', 'created_at', 'year', 'updated_by', 'updated_at'], 'integer'],
            [['prog_name', 'quarter', 'prog_expert1', 'university', 'prog_expert2', 'prog_expert3', 'prog_expert4', 'date_of_submission', 'status', 'date_of_colection'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = LearningProgramme::find();

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
            'university' => $this->university,
            'ZQF_level' => $this->ZQF_level,
            'prog_expert1' => $this->prog_expert1,
            'prog_expert2' => $this->prog_expert2,
            'prog_expert3' => $this->prog_expert3,
            'prog_expert4' => $this->prog_expert4,
            'year' => $this->year,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'prog_name', $this->prog_name])
            ->andFilterWhere(['like', 'date_of_submission', $this->date_of_submission])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'date_of_colection', $this->date_of_colection])->andFilterWhere(['like', 'quarter', $this->quarter]);

        return $dataProvider;
    }
}
