<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Term[]|\Cake\Collection\CollectionInterface $terms
 */
$this->assign('title', 'آموزگاران');
?>

    <?= $this->Form->create($teacher, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('آموزگار جدید') ?></legend>
        <?php
            echo $this->Form->control('firstName', ['label' => 'نام']);
            echo $this->Form->control('lastName', ['label' => 'نام خانوادگی']);
            echo $this->Form->control('mobile', ['label' => 'موبایل']);
            echo $this->Form->control('home', ['label' => 'نمایش در صفحه اول']);
            echo $this->Form->control('image', ["type" => "file", 'label' => 'تصویر آموزگار']);
        ?>
        <?= $this->Form->button(__('ذخیره')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
