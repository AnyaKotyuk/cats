<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\Cats;
use Yii;
use yii\helpers\Url;

class CatsController extends Controller
{

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
    public function actionCreate()
    {
        $model = new Cats();

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

}