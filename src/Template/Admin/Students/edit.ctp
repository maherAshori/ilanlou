<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Term[]|\Cake\Collection\CollectionInterface $terms
 */
$this->assign('title', 'دانش آموزان');
?>
<?= $this->Form->create($student) ?>
<fieldset>
    <legend><?= __('ویرایش دانش آموز') ?></legend>
    <?php
    echo $this->Form->control('firstName', ['label' => 'نام']);
    echo $this->Form->control('lastName', ['label' => 'نام خانوادگی']);
    echo $this->Form->control('nationalCode',  ['label' => 'کد ملی']);
    ?>
    <?= $this->Form->button(__('ذخیره')) ?>
</fieldset>
<?= $this->Form->end() ?>

