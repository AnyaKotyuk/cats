
<div class="row">

</div>

<?php
if (!empty($pets)) { ?>
    <ul>
    <?php foreach ($pets as $pet) { ?>
        <li><?= $pet->name;?></li>
    <?php } ?>
    </ul>

<?php } else { ?>
    <p>No cats</p>
<?php } ?>
