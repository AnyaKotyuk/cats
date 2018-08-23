<?php
namespace common\components;

use yii\base\Component;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Yii;

class ImageThumbnails extends Component
{

    private $thumbnailsSizes = [];

    public function init()
    {
        parent::init();
        $this->thumbnailsSizes = [[300, 200], [600, 400]];
    }

    public function save($model, $attr)
    {
        $uploader = UploadedFile::getInstance($model, $attr);
        if ($uploader) {
            $image_path = Yii::getAlias('@uploadsdir/'.$uploader->baseName.'.'.$uploader->extension);
            $uploader->saveAs($image_path);
            foreach ($this->thumbnailsSizes as $size) {
                $thumb = Yii::getAlias('@uploadsdir/'.$uploader->baseName).'-'.$size[0].'x'.$size[1].'.'.$uploader->extension;
                Image::resize($image_path, $size[0], $size[1])->save($thumb);
            }
        }
        return $uploader;
    }
}