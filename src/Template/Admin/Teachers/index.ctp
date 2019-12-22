<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Term[]|\Cake\Collection\CollectionInterface $terms
 */
$this->assign('title', 'آموزگاران');
?>

<div>
    <?= $this->Html->link(__('جدید'), ['action' => 'add']) ?>
    <hr>
</div>

    <h3><?= __('آموزگاران') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('firstName', 'نام') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile', 'موبایل') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code', 'کد') ?></th>
                <th scope="col" class="actions"><?= __('عملیات') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teachers as $teacher): ?>
            <tr>
                <td><?= h($teacher->fullName) ?></td>
                <td><?= h($teacher->mobile) ?></td>
                <td><?= $this->Number->format($teacher->code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('ویرایش'), ['action' => 'edit', $teacher->id]) ?>
                    <?= $this->Form->postLink(__('حذف'), ['action' => 'delete', $teacher->id], ['confirm' => __('آیا از حذف آموزگار {0} اطمینان دارید؟', $teacher->fullName)]) ?>
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
