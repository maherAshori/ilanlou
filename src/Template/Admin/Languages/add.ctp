<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course[]|\Cake\Collection\CollectionInterface $courses
 */

$this->assign('title', 'زبان ها');
?>

    <?= $this->Form->create($language, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('ایجاد زبان') ?></legend>
        <?php
            echo $this->Form->control('title', ['label' => 'زبان']);
            echo $this->Form->control('image', ["type" => "file", 'label' => 'تصویر']);
        ?>
        <?= $this->Form->button(__('ذخیره')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
