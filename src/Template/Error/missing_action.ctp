<?php
    $this->layout = 'error';
?>

<div class="text-center mt-5 pt-5">
    <h1 class="border bg-light p-3"><span class="text-danger"><?= $url ?></span> Not Found </h1>
    <div class="mt-5">
        <?= $this->Html->link("Back", '/', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
