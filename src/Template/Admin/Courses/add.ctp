<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course $course
 * @var \App\Model\Entity\Branch $branches
 */
$this->assign('title', 'دوره ها');
?>
    <?= $this->Form->create($course) ?>
    <fieldset>
        <legend><?= __('ایجاد دوره') ?></legend>
        <?php
            echo $this->Form->control('branch_id', ['options' => $branches, 'label' => 'شعبه را انتخاب نمایید']);
            echo $this->Form->control('name', ['label' => 'عنوان دوره']);
            echo $this->Form->control('description',  ['label' => 'توضیحات']);
        ?>
        <?= $this->Form->button(__('ذخیره')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
