<?php
namespace common\components;

use yii\base\Component;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Yii;
use yii\helpers\Url;

class ImageThumbnails extends Component
{

    private $DEFAULT_IMAGE = '/images/default-cat.jpg';
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
                $thumb = $this->getImageWithSize($image_path, $size);
                Image::resize($image_path, $size[0], $size[1])->save($thumb);
            }
        }
        return $uploader;
    }

    public function get($image, $size = 'full')
    {
        if (!$image) {
            return $this->DEFAULT_IMAGE;
        }
        $image = Yii::getAlias('@uploads/'.$image);
        return $this->getImageWithSize($image, $size);
    }

    private function getImageWithSize($image, $size)
    {
        if ($size == 'full') {
            return $image;
        }
        $image_data = explode('.', $image);
        $img_name = $image_data[0];
        $img_ext = $image_data[1];
        if (is_array($size)) {
            $image = $img_name.'-'.$size[0].'x'.$size[1].'.'.$img_ext;
        }
        return $image;
    }
}