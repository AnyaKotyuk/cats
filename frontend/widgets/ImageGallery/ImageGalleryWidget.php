<?php
/**
 * Image list nice preview
 * @var $image array ['src' => '', 'title' => '', 'text' => '']
 * title is optional
 */
namespace frontend\widgets\ImageGallery;

use yii\base\Widget;
use frontend\assets\ImageAsset;

class ImageGalleryWidget extends  Widget
{
    public $images;

    public function init()
    {
        parent::init();
        ImageAsset::register($this->view);
        ob_start();
    }

    public function run()
    {
        foreach ($this->images as $image) { ?>
            <a class="sb" href="<?= $image['src'] ?>" <?= (!empty($image['title'])?'title="'.$image['title'].'"':'') ?>>
                <?= $image['content'] ?>
            </a>
        <?php }
        return ob_get_clean();
    }
}