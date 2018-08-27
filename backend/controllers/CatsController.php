<?php

namespace backend\controllers;

use yii\web\Controller;
use common\models\Cats;
use yii\data\ActiveDataProvider;
use Yii;

class CatsController extends Controller
{

    public function actionIndex()
    {

        $catsQuery = Cats::find();
        $catsSearch = new Cats();
        $catsSearch->load(Yii::$app->request->get());

        $catsQuery->andFilterWhere(['LIKE', 'name', $catsSearch->name]);

        $catsProvider = new ActiveDataProvider([
            'query' => $catsQuery,
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        return $this->render('index', [
            'catsProvider' => $catsProvider,
            'catsSearch' => $catsSearch,
        ]);
    }
}