<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\Cats;
use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\imagine\Image;

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

            $model->picture = UploadedFile::getInstance($model, 'picture');
            if ($model->picture) {
                $image_path = Yii::getAlias('@uploadsdir/'.$model->picture->baseName.'.'.$model->picture->extension);
                $model->picture->saveAs($image_path);
                Image::resize($image_path, 300, 200)->save();
            }

            if ($model->save());


            return $this->redirect(Url::to('/cats/'));
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

}