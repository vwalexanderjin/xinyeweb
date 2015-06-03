<?php

namespace app\modules\comment\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\comment\models\Comment;

/**
 * CommentSearch represents the model behind the search form about `app\modules\comment\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'post_id', 'uid', 'pid', 'ctime', 'utime', 'status'], 'integer'],
            [['con'], 'safe'],
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
        $query = Comment::find();

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
            'post_id' => $this->post_id,
            'uid' => $this->uid,
            'pid' => $this->pid,
            'ctime' => $this->ctime,
            'utime' => $this->utime,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'con', $this->con]);

        return $dataProvider;
    }
}
