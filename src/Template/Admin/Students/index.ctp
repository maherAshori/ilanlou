<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Term[]|\Cake\Collection\CollectionInterface $terms
 */
$this->assign('title', 'دانش آموزان');
?>

<div>
    <?= $this->Html->link(__('جدید'), ['action' => 'add']) ?>
    <hr>
</div>

<h3><?= __('دانش آموزان') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('firstName', 'نام') ?></th>
        <th scope="col"><?= $this->Paginator->sort('lastName', 'نام خانوادگی') ?></th>
        <th scope="col"><?= $this->Paginator->sort('nationalCode', 'کد ملی') ?></th>
        <th scope="col"><?= $this->Paginator->sort('mobile', 'موبایل') ?></th>
        <th scope="col"><?= $this->Paginator->sort('code', 'کد') ?></th>
        <th scope="col" class="actions"><?= __('عملیات') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td><?= h($student->firstName) ?></td>
            <td><?= h($student->lastName) ?></td>
            <td><?= h($student->nationalCode) ?></td>
            <td><?= h($student->mobile) ?></td>
            <td><?= h($student->code) ?></td>
            <td class="actions">
                <?php if (!$classroomId): ?>
                    <?= $this->Html->link(__('ویرایش'), ['action' => 'edit', $student->id]) ?>
                    <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $student->id], ['confirm' => __('آیا از حذف دانش آموز {0} اطمینان دارید؟', $student->fullName)]) ?>
                <?php endif; ?>
                <?php if ($classroomId): ?>
                    <?= $this->Form->postLink(__('Join Course'), ['action' => 'join', $student->id, $classroomId], ['confirm' => __('Are you sure you want to add student # {0}?', $student->fullName)]) ?>
                <?php endif; ?>
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
