<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Course[]|\Cake\Collection\CollectionInterface $courses
 */

$this->assign('title', 'رویدادها');
?>
<div>
    <?= $this->Html->link(__('جدید'), ['action' => 'add']) ?>
    <hr>
</div>

    <h3><?= __('رویدادها') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title', 'عنوان') ?></th>
                <th scope="col"><?= $this->Paginator->sort('home', 'نمایش در صفحه اول') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creation_date', 'تاریخ انتشار') ?></th>
                <th scope="col" class="actions"><?= __('عملیات') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
            <tr>
                <td><?= h($event->title) ?></td>
                <td><?= h($event->home) ?></td>
                <td><?= h($event->creation_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('نمایش'), ['action' => 'view', $event->id]) ?>
                    <?= $this->Html->link(__('ویرایش'), ['action' => 'edit', $event->id]) ?>
                    <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $event->id], ['confirm' => __('آیا از حذف {0} اطمینان دارید؟?', $event->title)]) ?>
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
