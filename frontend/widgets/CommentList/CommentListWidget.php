<?php
/**
 * Comment List
 */
namespace frontend\widgets\CommentList;

use yii\base\Widget;
use frontend\assets\CommentListAsset;

class CommentListWidget extends  Widget
{
    public function init()
    {
        parent::init();
        CommentListAsset::register($this->view);
        ob_start();
    }

    public function run()
    {
        echo '<div id="root">';
        echo '<script type="module" src="ES6-Node.js"></script>';
        echo '<script type="text/babel">

import { Provider } from "react-redux";
document.addEventListener("DOMContentLoaded", function(event) {
    render(
        <Provider store={store}>
            <App />
        </Provider>,
        document.getElementById(\'root\')
    );
});</script>';
        return ob_get_clean();
    }
}