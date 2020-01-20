<?php
$this->assign('title', 'پروفایل من');
?>

<?= $this->Html->link(__('ویرایش پروفایل'), ['action' => 'edit', $teacher->id]) ?>
<hr>
<table class="vertical-table">
    <tr>
        <th class="text-right" scope="row">
            <?= __('نام') ?> : <?= h($teacher->firstName) ?>
        </th>
    </tr>
    <tr>
        <th class="text-right" scope="row"><?= __('نام خانوادگی') ?> : <?= h($teacher->lastName) ?> </th>
    </tr>
    <tr>
        <th class="text-right" scope="row"><?= __('شماره همراه') ?> : <?= h($teacher->mobile) ?></th>
    </tr>
</table>
