<?php
namespace common\models;

use yii\db\ActiveRecord;

class Cats extends ActiveRecord
{

    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'picture' => 'Photo',
            'description' => 'Description',
        ];
    }

    public function rules()
    {
        return [
            ['name', 'required'],
            ['picture', 'file'],
            ['name', 'string'],
            ['description', 'safe']
        ];
    }
}