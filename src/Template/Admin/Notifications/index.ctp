<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course[]|\Cake\Collection\CollectionInterface $courses
 */

$this->assign('title', 'پیام ها');
?>

<div>
    <?= $this->Html->link(__('جدید'), ['action' => 'add']) ?>
    <hr>
</div>
<h3><?= __('پیام ها') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('student_id', 'دانش آموز') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created', 'تاریخ ارسال') ?></th>
        <th scope="col" class="actions"><?= __('عملیات') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($notifications as $notification): ?>
        <tr>
            <td><?= $notification->has('student') ? $this->Html->link($notification->student->fullName, ['controller' => 'Students', 'action' => 'view', $notification->student->id]) : '' ?></td>
            <td><?= h($notification->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('نمایش'), ['action' => 'view', $notification->id]) ?>
                <?= $this->Html->link(__('ویرایش'), ['action' => 'edit', $notification->id]) ?>
                <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $notification->id], ['confirm' => __('آیا از حذف پیام اطمینان دارید؟', $notification->id)]) ?>
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
