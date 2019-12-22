
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course[]|\Cake\Collection\CollectionInterface $courses
 */

$this->assign('title', 'پیام ها');
?>
    <?= $this->Form->create($notification) ?>
    <fieldset>
        <legend><?= __('ویرایش پیام') ?></legend>
        <?php
            echo $this->Form->control('message', ['label' => 'متن پیام']);
        ?>
        <?= $this->Form->button(__('ذخیره')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
