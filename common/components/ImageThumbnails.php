<?php
namespace common\components;

use yii\base\Component;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Yii;

class ImageThumbnails extends Component
{

    private $DEFAULT_IMAGE = '/images/default-cat.jpg';
    private $thumbnailsSizes = [];

    public function init()
    {
        parent::init();
        $this->thumbnailsSizes = [[100, 100], [300, 200], [400, 300], [600, 400]];
    }

    /**
     * Save model image to uploads folder
     *
     * @param Model $model
     * @param string $attr - Model attribute name
     * @return UploadedFile
     */
    public function save($model, $attr)
    {
        $uploader = UploadedFile::getInstance($model, $attr);
        if ($uploader) {
            $imagePath = Yii::getAlias('@uploadsdir/'.$uploader->baseName.'.'.$uploader->extension);
            $uploader->saveAs($imagePath);
            foreach ($this->thumbnailsSizes as $size) {
                $this->thumb($imagePath, $size);
            }
        }
        return $uploader;
    }

    /**
     * Get full image absolute path
     *
     * @param string $image
     * @param array $size [width, height]
     * @return string image url
     */
    public function get($image, $size = [])
    {
        $imagePath = Yii::getAlias('@uploadsdir/'.$image);
        $imageUrl = Yii::getAlias('@uploads/'.$image);

        if (empty($size) || !in_array($size, $this->thumbnailsSizes)) {
            return file_exists($imagePath)?$imageUrl:$this->DEFAULT_IMAGE;
        }

        if (empty($image)) {
            $imagePath = Yii::getAlias('@webroot'.$this->DEFAULT_IMAGE);
            $imageThumbnail = $this->thumb($imagePath, $size);
            return str_replace(Yii::getAlias('@webroot'), Yii::getAlias('@web'), $imageThumbnail);
        }

        if ($imageThumbnail = $this->thumb($imagePath, $size)) {
            return str_replace(Yii::getAlias('@uploadsdir'), Yii::getAlias('@uploads'), $imageThumbnail);
        }

        return $this->DEFAULT_IMAGE;
    }

    /**
     * Get image rel path;
     * If image doesn't exist we try to save it
     *
     * @param string $image
     * @param array $size
     * @return bool|string
     */
    private function thumb($image, $size)
    {
        $imageThumb = $this->getImageWithSize($image, $size);

        if (file_exists($imageThumb)) {
            return $imageThumb;
        }

        if (!file_exists($image)) {
            return false;
        }

        $image_data = getimagesize($image);
        if (($image_data[0] < $size[0] && $image_data[1] < $size[1])) {
            return $image;
        }

        if (Image::thumbnail($image, $size[0], $size[1])->save($imageThumb)) {
            return $imageThumb;
        }
    }

    /**
     * Add image size to image name
     *
     * @param string $image
     * @param array $size
     * @return string
     */
    private function getImageWithSize($image, $size)
    {
        if (empty($size)) {
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