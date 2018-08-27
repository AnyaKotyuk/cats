<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $text
 * @property int $cat_id
 * @property string $published_at
 * @property int $user_id
 *
 * @property Cats $cat
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['cat_id', 'user_id'], 'integer'],
            [['published_at'], 'safe'],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cats::className(), 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'cat_id' => 'Cat ID',
            'published_at' => 'Published At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Cats::className(), ['id' => 'cat_id']);
    }
}
