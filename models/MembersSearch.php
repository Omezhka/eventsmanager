<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Members;

/**
 * MembersSearch represents the model behind the search form about `app\models\Members`.
 */
class MembersSearch extends Members
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_member'], 'integer'],
            [['firstname_rus', 'firstname_eng', 'lastname_rus', 'lastname_eng', 'country', 'city', 'company', 'mail'], 'safe'],
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
        $query = Members::find();

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
            'id_member' => $this->id_member,
        ]);

        $query->andFilterWhere(['like', 'firstname_rus', $this->firstname_rus])
            ->andFilterWhere(['like', 'firstname_eng', $this->firstname_eng])
            ->andFilterWhere(['like', 'lastname_rus', $this->lastname_rus])
            ->andFilterWhere(['like', 'lastname_eng', $this->lastname_eng])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'mail', $this->mail]);

        return $dataProvider;
    }
}
