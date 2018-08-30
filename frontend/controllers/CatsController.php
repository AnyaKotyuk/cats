<?php
namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Cats;
use Yii;
use yii\helpers\Url;
use common\models\Comments;

class CatsController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'only' => ['create'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $pets = Cats::find()->all();

        return $this->render('index', [
            'pets' => $pets
        ]);
    }

    /**
     * Create new pet
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate($id = null)
    {

        if ($id) {
            $model = Cats::findOne($id);
        } else {
            $model = new Cats();
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->picture = Yii::$app->thumbnail->save($model, 'picture');
            $model->save();
            return $this->redirect(Url::to('/cats/'));
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionView($name)
    {
        $cat = Cats::findOne(['name' => $name]);
        $comments = Comments::findAll(['cat_id' => $cat->id]);
        return $this->render('view', [
            'cat' => $cat,
            'comments' => $comments,
        ]);
    }

}