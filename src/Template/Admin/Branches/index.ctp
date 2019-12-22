<?php
$this->assign('title', 'شعبه ها');
?>

<div>
    <?= $this->Html->link(__('جدید'), ['action' => 'add']) ?>
    <hr>
</div>

    <h3><?= __('شعبه ها') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name', 'نام شعبه') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender', 'جنسیت') ?></th>
                <th scope="col" class="actions"><?= __('عملیات') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($branches as $branch): ?>
            <tr>
                <td><?= h($branch->name) ?></td>
                <td>
                    <?= $branch->gender == 0 ? 'دخترانه' : '' ?>
                    <?= $branch->gender == 1 ? 'پسرانه' : '' ?>
                    <?= $branch->gender == 2 ? 'پسرانه و دخترانه' : '' ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('نمایش'), ['action' => 'view', $branch->id]) ?>
                    <?= $this->Html->link(__('ویرایش'), ['action' => 'edit', $branch->id]) ?>
                    <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $branch->id], ['confirm' => __('آیا از حذف {0} اطمینان دارید؟', $branch->name)]) ?>
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
