<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course[]|\Cake\Collection\CollectionInterface $courses
 */

$this->assign('title', 'رویدادها');
?>

    <h3><?= h($event->title) ?></h3>
    <?= $this->Html->image("/uploads/events/".$event->image, ['style'=>'width: 100px;border: solid 1px #ccc;float: left;margin-bottom: 5px;']) ?>
    <div class="row">
        <h4><?= __('توضیحات') ?></h4>
        <?= $this->Text->autoParagraph(h($event->description)); ?>
    </div>
