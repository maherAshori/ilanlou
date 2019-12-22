<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course[]|\Cake\Collection\CollectionInterface $courses
 */

$this->assign('title', 'دوره ها');
?>
<div>
    <?= $this->Html->link(__('جدید'), ['action' => 'add']) ?>
    <hr>
</div>

    <h3><?= __('دوره ها') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('branch_id', 'شعبه') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', 'عنوان دوره') ?></th>
                <th scope="col" class="actions"><?= __('عملیات') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $course->has('branch') ? $this->Html->link($course->branch->name, ['controller' => 'Branches', 'action' => 'view', $course->branch->id]) : '' ?></td>
                <td><?= h($course->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('نمایش'), ['action' => 'view', $course->id]) ?>
                    <?= $this->Html->link(__('ویرایش'), ['action' => 'edit', $course->id]) ?>
                    <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $course->id], ['confirm' => __('آیا از حذف {0} اطمینان دارید؟', $course->name)]) ?>
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
