<?php

namespace app\modules\ad\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ad\models\Ad;

/**
 * AdSearch represents the model behind the search form about `app\modules\ad\models\Ad`.
 */
class AdSearch extends Ad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'position', 'ctime', 'utime', 'status', 'cid', 'sort'], 'integer'],
            [['title', 'description', 'mark', 'href', 'img'], 'safe'],
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
        $query = Ad::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'position' => $this->position,
            'ctime' => $this->ctime,
            'utime' => $this->utime,
            'status' => $this->status,
            'cid' => $this->cid,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'mark', $this->mark])
            ->andFilterWhere(['like', 'href', $this->href])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
