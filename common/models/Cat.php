<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cats".
 *
 * @property int $id
 * @property string $name
 * @property string $picture
 * @property string $description
 * @property string $publish_date
 *
 * @property Comments[] $comments
 */
class Cat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['publish_date'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['picture'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'picture' => 'Picture',
            'description' => 'Description',
            'publish_date' => 'Publish Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['cat_id' => 'id']);
    }
}
