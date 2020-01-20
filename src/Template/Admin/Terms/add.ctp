<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Term $term
 */
$this->assign('title', 'ترم');
?>

    <?= $this->Form->create($term) ?>
    <fieldset>
        <legend><?= __('ایجاد ترم') ?></legend>
        <?php
            echo $this->Form->control('branch_id', ['options' => $branches, 'label' => 'شعبه را انتخاب کنید']);
            echo $this->Form->control('name', ['label' => 'عنوان ترم']);
            echo $this->Form->control('description', ['label' => 'توضیحات']);
        ?>
        <?= $this->Form->button(__('ذخیره')) ?>
    </fieldset>
    <?= $this->Form->end() ?>
