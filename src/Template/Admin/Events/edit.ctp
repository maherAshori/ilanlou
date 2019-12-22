<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course[]|\Cake\Collection\CollectionInterface $courses
 */

$this->assign('title', 'رویداد ها');
?>
<?= $this->Form->create($event, ['type' => 'file']) ?>
<fieldset>
    <legend>
        <?= __('ویرایش رویداد') ?>
        <?= $this->Html->image("/uploads/events/".$event->image, ['style'=>'width: 100px;border: solid 1px #ccc;float: left;margin-bottom: 5px;']) ?>
    </legend>
    <?php
    echo $this->Form->control('title', ['label' => 'عنوان']);
    echo $this->Form->control('description', ['label' => 'توضیحات']);
    echo $this->Form->control('home', ['label' => 'نمایش در صفحه اول']);
    echo $this->Form->control('image', ["type" => "file", 'label' => 'تصویر رویداد']);
    ?>
    <?= $this->Form->button(__('ذخیره')) ?>
</fieldset>
<?= $this->Form->end() ?>
