<?php

use frontend\assets\ReactAsset;
ReactAsset::register($this);

?>

<div id="article-form"></div>
<div id="article-list"></div>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        renderApp('ArticleList', 'article-list');
        renderApp('ArticleForm', 'article-form');
    });

</script>
