<?php

namespace core\modules\user\backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public function rules()
    {
        return [
            [['id', 'status', 'type', 'createdAt', 'updatedAt'], 'integer'],
            [['email'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
                'sort' => [
                    'defaultOrder' => [
                        'createdAt' => SORT_DESC,
                    ],
                ],
            ]
        );
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(
            [
                'user.id' => $this->id,
                'type' => $this->type,
                'user.status' => $this->status,
            ]
        );
        $query->andFilterWhere(['like', 'email', $this->email]);
        return $dataProvider;
    }
}
