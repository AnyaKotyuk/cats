<?php
namespace common\components;

use yii\base\Component;
use yii\base\Model;
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
        $this->thumbnailsSizes = [[100, 100], [300, 200], [600, 400]];
    }

    /**
     * Save model image to uploads folder
     *
     * @param Model $model
     * @param string $attr - Model attribute name
     * @return null|UploadedFile
     */
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

    /**
     * Get full image absolute path
     *
     * @param string $image
     * @param string $size
     * @return string
     */
    public function get($image, $size = 'full')
    {
        if (!empty($image)) {
            $image = Yii::getAlias('@uploads/'.$image);
            $thumbImage = $this->getImageWithSize($image, $size);
        }

        if (empty($thumbImage) || !$this->imageExists($thumbImage)) {
            $thumbImage = $this->getImageWithSize($this->DEFAULT_IMAGE, $size);
            if (!$this->imageExists($thumbImage)) {
                $thumbImage = $this->getImageWithSize($this->DEFAULT_IMAGE, 'full');
            }
        }
        return $thumbImage;
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

    /**
     * Check does image really exists
     *
     * @param $image
     * @return bool
     */
    private function imageExists($image)
    {
        $rel_path = str_replace(Yii::getAlias('@uploads'), Yii::getAlias('@uploadsdir'), $image);
        return file_exists($rel_path)?true:false;
    }
}