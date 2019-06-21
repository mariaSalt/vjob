<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mined;

/**
 * MinedSearch represents the model behind the search form of `app\models\Mined`.
 */
class MinedSearch extends Mined
{
    /**
     * {@inheritdoc}
     */
    public $typeName;



    public function rules()
    {
        return [
            [['typeName'], 'safe'],
            [['id', 'type_id', 'gnome_id', 'status_mineral_id', 'mined_at', 'elf_id', 'master_gnome_id', 'purporsed_at', 'conformed_at_elf'], 'integer'],
            [['automatic'], 'boolean'],
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
        $query = Mined::find();

        $query->joinWith(['type']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['typeName'] = [
            'asc' => [Settings::tableName().'.type' => SORT_ASC],
            'desc' => [Settings::tableName().'.type' => SORT_DESC],
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
            'type_id' => $this->type_id,
            'gnome_id' => $this->gnome_id,
            'status_mineral_id' => $this->status_mineral_id,
            'mined_at' => $this->mined_at,
            'elf_id' => $this->elf_id,
            'master_gnome_id' => $this->master_gnome_id,
            'purporsed_at' => $this->purporsed_at,
            'conformed_at_elf' => $this->conformed_at_elf,
            'automatic' => $this->automatic,])
        ->andFilterWhere(['like', Settings::tableName().'.type', $this->typeName]);

        return $dataProvider;
    }
}
