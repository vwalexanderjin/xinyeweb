<?php

namespace app\modules\post\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\post\models\Post;

/**
 * PostSearch represents the model behind the search form about `app\modules\post\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ishot', 'status', 'ctime', 'utime', 'cid', 'uid'], 'integer'],
            [['title', 'title_second', 'redirect_url', 'thumb', 'from', 'seo_title', 'seo_keywords', 'seo_description', 'template', 'tags', 'info', 'content', 'type'], 'safe'],
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
        $query = Post::find();

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
            'ishot' => $this->ishot,
            'status' => $this->status,
            'ctime' => $this->ctime,
            'utime' => $this->utime,
            'cid' => $this->cid,
            'uid' => $this->uid,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title_second', $this->title_second])
            ->andFilterWhere(['like', 'redirect_url', $this->redirect_url])
            ->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'from', $this->from])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_keywords', $this->seo_keywords])
            ->andFilterWhere(['like', 'seo_description', $this->seo_description])
            ->andFilterWhere(['like', 'template', $this->template])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
