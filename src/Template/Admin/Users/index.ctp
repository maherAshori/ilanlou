<?php
$this->assign('title', 'کاربران');
?>

<div>
    <?= $this->Html->link(__('جدید'), ['action' => 'add']) ?>
    <hr>
</div>

<h3><?= __('کاربران پنل') ?></h3>

<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('firstName', 'نام') ?></th>
        <th scope="col"><?= $this->Paginator->sort('lastName', 'نام خانوادگی') ?></th>
        <th scope="col"><?= $this->Paginator->sort('mobile', 'موبایل') ?></th>
        <th scope="col"><?= $this->Paginator->sort('code', 'کد') ?></th>
        <th scope="col" class="actions"><?= __('عملیات') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->firstName) ?></td>
            <td><?= h($user->lastName) ?></td>
            <td><?= h($user->mobile) ?></td>
            <td><?= h($user->code) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('ویرایش'), ['action' => 'edit', $user->id]) ?>
                <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $user->id], ['confirm' => __('آیا از حذف کاربر {0} اطمینان دارید؟', $user->fullName)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('اولین صفحه')) ?>
        <?= $this->Paginator->prev('< ' . __('قبلی')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('بعدی') . ' >') ?>
        <?= $this->Paginator->last(__('آخرین صفحه') . ' >>') ?>
    </ul>
</div>

