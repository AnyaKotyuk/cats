<?php

namespace frontend\controllers;

use common\models\Cats;
use yii\web\Controller;
use common\models\Comments;
use Yii;
use yii\helpers\Url;

class CommentsController extends Controller
{
    public function actionAdd($cat_id)
    {

        $comment = new Comments();
        $cat = Cats::findOne($cat_id);

        if ($comment->load(Yii::$app->request->post()) && $comment->validate()) {
            $comment->cat_id = $cat_id;
            $comment->save();
            $this->redirect(Url::to(['/cats/view', 'name' => $cat->name]));
        } else {
            return $this->render('add', ['comment' => $comment]);
        }
    }
}