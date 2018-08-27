<?php

use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $catsProvider,
    'filterModel' => $catsSearch,
    'columns' => [
        'id',
        'name',
        [
            'header' => 'Description',
            'content' => function($model) {
                return \yii\helpers\StringHelper::truncate($model->description, 100);
            }
        ],
        [
            'header' => 'Picture',
            'content' => function($model) {
                            return '<img src="'.Yii::$app->thumbnail->get($model->picture, [100, 100]).'">';
            }
        ],
        [
            'header' => 'Actions',
            'class' => \yii\grid\ActionColumn::className(),
            'template' => '{update} {view}'
        ]
    ]
]);