<?php
$this->assign('title', 'شعبه ها');
?>

<?= $this->Form->create($branch) ?>
<fieldset>
    <legend><?= __('ویرایش شعبه') ?></legend>
    <?php
    echo $this->Form->control('name', ['label' => 'نام شعبه']);
    echo $this->Form->control('gender', ['options' => [
        0 => 'دخترانه',
        1 => 'پسرانه',
        2 => 'پسرانه و دخترانه'
    ], 'label' => 'جنسیت']);
    echo $this->Form->control('description', ['label' => 'توضیحات']);
    ?>
    <?= $this->Form->button(__('ذخیره')) ?>
</fieldset>
<?= $this->Form->end() ?>
