<?php
$this->assign('title', 'کاربران');
?>

<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('ویرایش کاربر') ?></legend>
    <?php
    echo $this->Form->control('firstName', ['label' => 'نام']);
    echo $this->Form->control('lastName', ['label' => 'نام خانوادگی']);
    echo $this->Form->control('mobile', ['label' => 'موبایل']);
    ?>
    <?= $this->Form->button(__('ذخیره')) ?>
</fieldset>
<?= $this->Form->end() ?>
